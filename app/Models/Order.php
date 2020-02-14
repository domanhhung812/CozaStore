<?php

namespace App\Models;
use App\Models\Products;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table="orders";
    protected $guarded = ['*'];

    public function product(){
        return $this->belongsTo(Products::class, 'or_product_id');
    }
}
