<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Sizes;
use App\Models\Colors;
use App\Models\Comments;
use Illuminate\Support\Facades\DB;

class ProductController extends BaseController
{
    public function index(Categories $cate, Products $pd)
    {
    	// load cate
    	$data = [];
    	$data['cate'] = $this->getAllDataCategoriesForUser($cate);

    	$listPd = $pd->getDataProductForUser();
    	$arrPd = $listPd ? $listPd->toArray() : [];
    	$data['listPd'] = $arrPd['data'] ?? [];
    	$data['link'] = $listPd; 

    	foreach($data['listPd'] as $key => $item){
    		$data['listPd'][$key]['image_product'] = json_decode($item['image_product'],true);
    	}

    	return view('frontend.product.index',$data);
    }

    public function detail($id, Request $request, Products $pd, Sizes $size, Colors $color, Categories $cate)
    {
    	// lay thong tin cua san pham
			$infoPd = $pd->getInfoDataProductById($id);
			$items = Products::all();
    	if($infoPd){
    		$arrColor = json_decode($infoPd['colors_id'], true);
    		$arrSize = json_decode($infoPd['sizes_id'], true);
    		$arrImage = json_decode($infoPd['image_product'],true);
				$arrProducts = json_decode($items);
    		$infoColor = $color->getInfoColorByArrId($arrColor);
    		$infoSize  = $size->getInfoSizeByArrid($arrSize);
    		$data = [];
				$data['info'] = $infoPd;
				$data['items'] = $arrProducts;
    		$data['images'] = $arrImage;
    		$data['colors'] = $infoColor;
    		$data['sizes'] = $infoSize;
				$data['cate'] = $this->getAllDataCategoriesForUser($cate);
				$data['comments'] = Comments::where('co_product_id', $id)->get();

    		return view('frontend.product.detail',$data);

    	} else {
    		abort(404);
    	}
		}
		public function getCategories(Request $request, $id){
			$min = $request->min_price;
			$max = $request->max_price;
			$sortDate = $request->sortDate;
			$sortPrice = $request->sortPrice === 'asc' ? '1' : '0';
			if($min && $max){
				$items = DB::table('products')->whereJsonContains('categories_id', $id)->whereBetween('price', [$min, $max])->get();
				if($sortPrice === '1'){
					$items = DB::table('products')->whereJsonContains('categories_id', $id)->whereBetween('price', [$min, $max])->orderBy('price','asc')->get();
				}else if($sortPrice === '0'){
					$items = DB::table('products')->whereJsonContains('categories_id', $id)->whereBetween('price', [$min, $max])->orderBy('price','desc')->get();
				}
			}else if($sortPrice === '1'){
				$items = DB::table('products')->whereJsonContains('categories_id', $id)->orderBy('price','asc')->get();
			}else if($sortPrice === '0'){
				$items = DB::table('products')->whereJsonContains('categories_id', $id)->orderBy('price','desc')->get();
			}
			else{
				$items = DB::table('products')->whereJsonContains('categories_id', $id)->get();
			}
			return view('frontend.categories.index', compact('items'));
		}
		public function postComments(Request $request, $id)
		{
			$comments = new Comments;
			$comments->co_name = $request->co_name;
			$comments->co_email = $request->co_email;
			$comments->co_content = $request->co_content;
			$comments->co_product_id = $id;
			$comments->co_rating = $request->rating;
			$comments->save();
			\Toastr::success('Thêm comment thành công', 'Thành công', ["positionClass" => "toast-top-right"]);
			return redirect()->back();
		}
		public function searchProducts(Request $request){
			$search = $request->search;
			if($search){
				$items = DB::table('products')->where('name_product','like', '%'.$search.'%')->paginate(12);
				return view('frontend.search.index',compact('items'));
			}
		}
}