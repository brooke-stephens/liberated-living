<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
	protected $fillable = ['id','product_id, price, sku, size, quantity'];

    public function product(){
    	return $this->belongsTo('App\Product');
    }
}
