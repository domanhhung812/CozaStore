<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sizes extends Model
{
    protected $table = 'sizes';

    public function products()
    {
    	return $this->belongsToMany('App\Models\Products');
    }

    public function getInfoSizeByArrid($arrId = [])
    {
        $data = Sizes::select('*')
                      ->whereIn('id',$arrId)
                      ->get();
        if($data){
            $data = $data->toArray();
        }
        return $data;
    }

    public function getAllDataSizes()
    {
        $data = Sizes::all();
        if($data){
            $data = $data->toArray();
        }
        return $data;
    }
    public function deleteSizesById($id)
    {
        $del = DB::table('sizes')
                   ->where('id',$id)
                   ->delete();
        return $del;
    }

}
