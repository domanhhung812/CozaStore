<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Categories extends Model
{
    protected $table = 'categories';

    // tao phuong thuc de lien ket moi quan hen many-to-many
    public function products()
    {
    	return $this->belongsToMany('App\Models\Products');
    }

    public function getAllDataCategories()
    {
    	$data = Categories::all();
    	if($data){
    		$data = $data->toArray();
    	}
    	return $data;
    }
    public function deleteCategoryById($id)
    {
        $del = DB::table('categories')
                   ->where('id',$id)
                   ->delete();
        return $del;
    }

    public function getInfoDataCategoryById($id)
    {
        $data = Categories::find($id);
        if($data){
            $data = $data->toArray();
        }
        return $data;
    }

    public function updateDataCategoryById($data, $id)
    {
        $up = DB::table('categories')
                    ->where('id',$id)
                    ->update($data);
        return $up;
    }
    public function addDataCategories($data)
    {
        if(DB::table('categories')->insert($data)){
            return true;
        }  
        return false;
    }
}
