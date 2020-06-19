<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// su dung model
use App\Models\Categories;
use App\Models\Colors;
use App\Models\Sizes;
use App\Models\Brands;
use App\Models\Products;
use App\Models\Comments;
use App\Models\ProductDetails;
use App\Http\Requests\StoreProductsPost;

class ProductController extends Controller
{
    public function index(Request $request, Products $pd, Categories $cat, Colors $color, Sizes $size)
    {
        $keyword = trim($request->q);

        $data = [];
        $data['mess'] = $request->session()->get('addPd');
        $data['cat'] = $cat->getAllDataCategories();
        $data['sizes'] = $size->getAllDataSizes();
        $data['colors'] = $color->getAllDataColors();

        $lstPd = $pd->getAllDataProduct($keyword);
        $arrPd = ($lstPd) ? $lstPd->toArray() : [];
        $data['lstPd'] = $arrPd['data'];
        $data['link']  = $lstPd;

        $arr_rate = 0;
        $count = 1;
        $rate = [];
        foreach($data['lstPd'] as $key => $item) {
            // xu ly cat
            $data['lstPd'][$key]['categories_id'] = json_decode($item['categories_id'],true);
            // xu ly color
            $data['lstPd'][$key]['colors_id'] = json_decode($item['colors_id'],true);
            // xu ly size
            $data['lstPd'][$key]['sizes_id'] = json_decode($item['sizes_id'],true);
            // xu ly images product
            $data['lstPd'][$key]['image_product'] = json_decode($item['image_product'],true);
            $product_id = $data['lstPd'][$key]['id'];
            $rating = Products::join('comments', 'products.id', '=', 'comments.co_product_id')
                        ->select('co_rating')
                        ->where('comments.co_product_id',$product_id)
                        ->get();
            // $count = count(json_decode($rating));
            $arr = json_decode($rating);
            $rate += $arr;
            // dd($avg_rating);
        }
        for($i = 0; $i < count($rate); $i++){
            $arr_rate = $rate[$i]->co_rating + $arr_rate;
            
        }
        $count = count($rate);
        if($count === 0 || $count === null || $rate === []) {
            $avg_rate = 0;
        }else{
            $avg_rate = ceil($arr_rate/$count);
        }
        //dd(count($rate));
        $data['avg_rating'] = $avg_rate;
        foreach($data['lstPd'] as $key => $item){
           foreach($data['cat'] as $k => $val){
                if(in_array($val['id'], $item['categories_id'])){
                    $data['lstPd'][$key]['categories_id']['name_cat'][] = $val['name'];
                }
           }  
        }

        foreach($data['lstPd'] as $key => $item){
           foreach($data['colors'] as $k => $val){
                if(in_array($val['id'], $item['colors_id'])){
                    $data['lstPd'][$key]['colors_id']['name_color'][] = $val['name_color'];
                }
           }
        }
        
        foreach($data['lstPd'] as $key => $item){
            // dd($item['sizes_id']);
        
            foreach($data['sizes'] as $k => $val){
                // dd($item['sizes_id']);
                
                    $data['lstPd'][$key]['sizes_id']['letter_size'][] = $val['letter_size'];
                
           }
        }
    	return view('admin.product.index',$data)->render();
    }

    public function addProduct(Categories $cat, Colors $color, Sizes $size, Brands $brand, Request $request)
    {
    	$data = [];
    	$data['cat'] = $cat->getAllDataCategories();
    	$data['colors'] = $color->getAllDataColors();
    	$data['sizes'] = $size->getAllDataSizes();
    	$data['brands'] = $brand->getAllDataBrands();
        $data['mess'] = $request->session()->get('addPd');

    	// lay du lieu tu bang categories do ra view
    	return view('admin.product.add_view',$data);
    }

    public function handleAddProduct(Request $request, Products $pd)
    {
        $sizeId = Sizes::select('id')->orderBy('id')->get();
        $idSizes = json_decode($sizeId);
        $data = array();
        foreach($idSizes as $item){
            if(isset($data[$item->id])){
                $data[$item->id] = array();
            }
            $data[$item->id] = $request->post('size_qty_'.$item->id);
        }
        $nameProduct = $request->nameProduct;
        $categories  = $request->cat;
        $colors = array($request->color);
        $brand = $request->brands;
        $price = $request->price;
        $qty = 0;
        $sale = $request->sale;
        $description = $request->description;
        $arrNameFile = [];
        // thuc hien upload file
        // kiem tra xem nguoi co chon file ko
        if($request->hasFile('images')){
            // lay thong tin cua file
            $files = $request->file('images');
            // mang dinh nghia cac file hop le
            $extension = ['png','jpg','gif','jepg'];

            foreach ($files as $key => $item) {
                // lay ra duoc ten file va duong dan luu tam thoi cua file tren may cua nguoi dung
                $nameFile = $item->getClientOriginalName();
                // lay ra duoi file (phan mo rong cua file)
                $exFiles = $item->getClientOriginalExtension();
                // kiem tra co hop le hay ko thi cho upload
                if(in_array($exFiles, $extension)){
                    // tien hanh upload
                    // public_path() : di vao thuc muc public
                    // trong thu muc public : neu chua ton tai thu muc upload va thu muc images thi no tu dong tao
                    $item->move(public_path().'/upload/images',$nameFile);
                    $arrNameFile[] = $nameFile;
                }
            }
        }

            
        // tien hanh luu thong vao db
        if($arrNameFile){
            // luu vao db
            // json_encode : bien mang thanh chuoi json - object trong js
            $dataInsert = [
                'name_product' => $nameProduct,
                'pro_slug' => str_slug($nameProduct),
                'categories_id' => json_encode($categories),
                'colors_id' => json_encode($colors),
                'sizes_id' => json_encode($data),
                'brands_id' => $brand,
                'price' => $price,
                'qty' => 0,
                'description' => $description,
                'image_product' => json_encode($arrNameFile),
                'sale_off' => $sale,
                'status' => 1,
                'view_product' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
            ];
            if($pd->addDataProduct($dataInsert)){
                $lastId  = Products::orderBy('id', 'desc')->take(1)->first();
                foreach($data as $key => $item){
                    $proDetail = new ProductDetails();
                    $proDetail->pd_product_id = $lastId->id;
                    $proDetail->pd_color_id = $colors[0];
                    $proDetail->pd_size_id = $key;
                    $proDetail->pd_qty = $item;
                    $proDetail->save();
                }
                $totalQty = 0;
                    $amount = ProductDetails::select('pd_qty')->where('pd_product_id',$lastId->id)->get();
                    foreach($amount as $key => $value){
                        $totalQty+=$value->pd_qty;
                    }
                    
                    $products = Products::find($lastId->id);
                    $products->qty = $totalQty;
                    $products->save();
                \Toastr::success('Thêm sản phẩm thành công', '', ["positionClass" => "toast-top-right"]);
                return redirect()->route('admin.products');
            } else {
                $request->session()->flash('addPd','Fail');
                return redirect()->route('admin.addProduct');
            }
        } else {
            $request->session()->flash('addPd','Can not upload image');
            return redirect()->route('admin.addProduct');
        }
    }

    public function deleteProduct(Request $request, Products $pd)
    {
        if($request->ajax()){
            // dung la ajax gui len thi moi xu ly
            $id = $request->id;
            $del = $pd->deleteProductById($id);
            if($del){
               echo "OK"; 
            } else {
                echo "FAIL";
            }
        }
    }

    public function editProduct($id, Request $request, Products $pd, Categories $cat, Colors $color, Sizes $size, Brands $brand)
    {
        $id = is_numeric($id) ? $id : 0;
        // lay thong tin san pham theo id
        $infoPd = $pd->getInfoDataProductById($id);
        $qtySizes = Sizes::join('products_detail','products_detail.pd_size_id','=','sizes.id')
                                    ->where('products_detail.pd_product_id', $id)
                                    ->select('sizes.*','pd_qty')
                                    ->get();
        if($infoPd){
            $data = [];
            $data['cat'] = $cat->getAllDataCategories();
            $data['colors'] = $color->getAllDataColors();
            $data['sizes'] = json_decode($qtySizes);
            $data['brands'] = $brand->getAllDataBrands();
            $data['info'] = $infoPd;

            $data['infoCat'] = json_decode($infoPd['categories_id'],true);
            $data['infoColor'] = json_decode($infoPd['colors_id'],true);
            $data['infoSize'] = json_decode($infoPd['sizes_id'],true);
            $data['infoImage'] = json_decode($infoPd['image_product'],true);
            //dd($infoPd);

            return view('admin.product.edit_view',$data);
        } else {
            abort(404);
        }
    }

    public function handleEditProduct(Request $request, Products $pd)
    {
        // lay cac du lieu tu form nguoi dung gui len
        $id = $request->id;
        $infoPd = $pd->getInfoDataProductById($id);
        $sizeId = Sizes::select('id')->orderBy('id')->get();
        $idSizes = json_decode($sizeId);
        $data = array();
        foreach($idSizes as $item){
            if(isset($data[$item->id])){
                $data[$item->id] = array();
            }
            $data[$item->id] = $request->post('size_qty_'.$item->id);
        }
        if($infoPd){
            $nameProduct = $request->nameProduct;
            $categories  = $request->cat;
            $colors = array($request->color);
            $brand = $request->brands;
            $price = $request->price;
            $qty = 0;
            $sale = $request->sale;
            $description = $request->description;
            // nhung anh ban dau khi add - truoc khi edit san pham
            $arrNameFile  = json_decode($infoPd['image_product'],true);
            $arrNameFile2 = [];

            // thuc hien upload file
            // kiem tra xem nguoi co chon file ko
            if($request->hasFile('images')){
                // lay thong tin cua file
                $files = $request->file('images');
                // mang dinh nghia cac file hop le
                $extension = ['png','jpg','gif','jepg'];

                foreach ($files as $key => $item) {
                    // lay ra duoc ten file va duong dan luu tam thoi cua file tren may cua nguoi dung
                    $nameFile = $item->getClientOriginalName();
                    // lay ra duoi file (phan mo rong cua file)
                    $exFiles = $item->getClientOriginalExtension();
                    // kiem tra co hop le hay ko thi cho upload
                    if(in_array($exFiles, $extension)){
                        // tien hanh upload
                        // public_path() : di vao thuc muc public
                        // trong thu muc public : neu chua ton tai thu muc upload va thu muc images thi no tu dong tao
                        $item->move(public_path().'/upload/images',$nameFile);
                        $arrNameFile2[] = $nameFile;
                    }
                }

            }
            $arrNameFile = ($arrNameFile2) ? $arrNameFile2 : $arrNameFile;

            if($arrNameFile){
                $dataUpdate = [
                    'name_product' => $nameProduct,
                    'pro_slug' => str_slug($nameProduct),
                    'categories_id' => json_encode($categories),
                    'colors_id' => json_encode($colors),
                    'sizes_id' => json_encode($data),
                    'brands_id' => $brand,
                    'price' => $price,
                    'qty' => 0,
                    'description' => $description,
                    'image_product' => json_encode($arrNameFile),
                    'sale_off' => $sale,
                    'updated_at' => date('Y-m-d H:i:s')
                ];
                $up = $pd->updateDataProductById($dataUpdate, $id);
                if($up){
                    $proDetail = ProductDetails::where('pd_product_id',$id)->get();
                    $data = json_decode($proDetail);
                    foreach($data as $key => $item){
                        $proDetail2 = ProductDetails::find($item->id);
                        $proDetail2->pd_product_id = $id;
                        $proDetail2->pd_size_id = $request->get('size_detail_'.$item->pd_size_id);
                        $proDetail2->pd_color_id = $request->get('color');
                        $proDetail2->pd_qty = $request->get('size_qty_'.$item->pd_size_id);
                        $proDetail2->save();
                        
                    }
                    $totalQty = 0;
                    $amount = ProductDetails::select('pd_qty')->where('pd_product_id',$id)->get();
                    foreach($amount as $key => $value){
                        $totalQty+=$value->pd_qty;
                    }
                    
                    $products = Products::find($id);
                    $products->qty = $totalQty;
                    $products->save();

                    \Toastr::success('Updated succesfully', '', ["positionClass" => "toast-top-right"]);
                    return redirect()->route('admin.products');
                } else {
                    \Toastr::error('Updated fail', '', ["positionClass" => "toast-top-right"]);
                    return redirect()->route('admin.editProduct',['id'=>$id]);
                }
            } else {
                \Toastr::info("Can't upload image", "", ["positionClass" => "toast-top-right"]);
                return redirect()->route('admin.editProduct',['id'=>$id]);
            }
        } else {
            abort(404);
        }
    }
}
