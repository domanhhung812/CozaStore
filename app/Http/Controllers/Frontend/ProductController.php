<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Sizes;
use App\Models\Colors;
use App\Models\Users;
use App\Models\Comments;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Services\ProcessViewService;

class ProductController extends BaseController
{
	private function getRalativeProducts($cateId)
	{
        $items = DB::table('products')->whereJsonContains('categories_id', $cateId)->select('id','name_product','categories_id', 'price','image_product', 'sale_off', 'pro_slug')->get();
		return $items;
	}
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
			$url = $request->segment('4');
			$id = preg_split('/(-)/i', $url);
			$infoPd = $pd->getInfoDataProductById($id);
			$sizes = Sizes::join('products_detail', 'sizes.id','=','products_detail.pd_size_id')
							->where('pd_product_id', $id)
							->select('sizes.*','products_detail.pd_qty')
							->get();
			$arrSizes = json_decode($sizes);
			$items = Products::all();
			if(Auth::id()){
				$userId = Auth::id();
					$product = Products::find($id);
					$infoUser = Users::select('email','username')->where('id',$userId)->get();
					$userName = json_decode($infoUser)[0]->username;
					$userEmail = json_decode($infoUser)[0]->email;
					if($infoPd){
					$arrColor = json_decode($infoPd[0]['colors_id'], true);
					// $arrSize = json_decode($infoPd[0]['sizes_id'], true);
					//dd($arrSize);
					$arrImage = json_decode($infoPd[0]['image_product'],true);
					$arrProducts = json_decode($items);
					$infoColor = $color->getInfoColorByArrId($arrColor);
					// $infoSize  = $size->getInfoSizeByArrid($arrSize);
					$cateId = Products::select('categories_id')->where('id', $id)->first();
					$countStr = strlen($cateId->categories_id);
					$cateId1 = substr($cateId->categories_id,-($countStr-2));
					$idCate = substr($cateId1,0,($countStr-4));
					$data = [];
					$data['info'] = $infoPd;
					$data['items'] = $arrProducts;
					$data['images'] = $arrImage;
					$data['colors'] = $infoColor;
					$data['sizes'] = $arrSizes;
					$data['cate'] = $this->getAllDataCategoriesForUser($cate);
					$data['comments'] = Comments::where('co_product_id', $id)->get();
					$data['userName'] = $userName;
					$data['userEmail'] = $userEmail;
					$data['relativeProducts'] = $this->getRalativeProducts($idCate);
					//dd($data['sizes']);
					return view('frontend.product.detail',$data);

				} else {
					abort(404);
				}
			}else{
				$product = Products::find($id);
				if($infoPd){
					$arrColor = json_decode($infoPd[0]['colors_id'], true);
					// $arrSize = json_decode($infoPd[0]['sizes_id'], true);
					$arrImage = json_decode($infoPd[0]['image_product'],true);
					$arrProducts = json_decode($items);
					$infoColor = $color->getInfoColorByArrId($arrColor);
					// $infoSize  = $size->getInfoSizeByArrid($arrSize);
					$cateId = Products::select('categories_id')->where('id', $id)->first();
					$countStr = strlen($cateId->categories_id);
					$cateId1 = substr($cateId->categories_id,-($countStr-2));
					$idCate = substr($cateId1,0,($countStr-4));
					
					
					$data = [];
					$data['info'] = $infoPd;
					$data['items'] = $arrProducts;
					$data['images'] = $arrImage;
					$data['colors'] = $infoColor;
					$data['sizes'] = $arrSizes;
					$data['cate'] = $this->getAllDataCategoriesForUser($cate);
					
					$data['relativeProducts'] = $this->getRalativeProducts($idCate);
					
					return view('frontend.product.detail',$data);
			}
		}
	}	
	public function getCategories(Request $request, $id){
		$url = $request->segment('4');
		$id = preg_split('/(-)/i', $url)[0];
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