<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Products extends Model
{
    // chi dinh file model nay lam viec voi bang du lieu nao
    protected $table = 'products';

    public function brands()
    {
    	// tao moi quan he one-to-many voi Brands
    	return $this->belongsTo('App\Models\Brands');
    }

    public function categories()
    {
    	return $this->belongsToMany('App\Models\Categories');
    }

    public function sizes()
    {
    	return $this->belongsToMany('App\Models\Sizes');
    }

    public function colors()
    {
    	return $this->belongsToMany('App\Models\Colors');
    }
    public function products_detail()
    {
    	return $this->belongsToMany('App\Models\ProductDetails');
    }
    public function favorite()
    {
        return $this->belongsToMany(Users::class,'user_favorite','uf_product_id','uf_user_id');
    }
    public function addDataProduct($data)
    {
        if(DB::table('products')->insert($data)){
            return true;
        }  
        return false;
    }

    public function getAllDataProduct($keyword = '')
    {
        $data = Products::select('products.*', 'brands.brand_name')
                ->join('brands','brands.id','=','products.brands_id')
                ->where('products.name_product','LIKE','%'.$keyword.'%')
                ->orWhere('products.price', 'LIKE' , '%'.$keyword.'%')
                ->orderBy('products.id')
                ->paginate(100);
        // if($data){
        //     $data = $data->toArray();
        // }
        return $data;
    }

    public function deleteProductById($id)
    {
        $del = DB::table('products')
                   ->where('id',$id)
                   
                   ->delete();
        return $del;
    }

    public function getInfoDataProductById($id)
    {
        $data = Products::find($id);
        if($data){
            $data = $data->toArray();
        }
        return $data;
    }

    public function updateDataProductById($data, $id)
    {
        $up = DB::table('products')
                    ->where('id',$id)
                    ->update($data);
        return $up;
    }

    public function getDataProductForUser()
    {
        $data = Products::select('*')
        ->orderBy('id')
                ->paginate(12);
        return $data;
    }
    public function getRalativeProducts($idCate)
	{
        $products = DB::table('products')
                            ->select('id','name_product','pro_slug','price','image_product','sale_off')
                            ->where('categories_id', $idCate)
							->orderBy('id')
							->get();
		return $products;
	}
}
