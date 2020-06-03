<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserFavorite extends Model
{
    protected $table="user_favorite";
    protected $guarded = ['*'];

    public function product(){
        return $this->belongsTo(Products::class, 'uf_product_id');
    }
}
