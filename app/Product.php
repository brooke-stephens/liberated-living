<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   protected $fillable = ['title, description, price, sku, size, quantity, category'];

   public function product_images(){
        return $this->hasMany('App\ProductImage');
    }

    public function product_variants(){
        return $this->hasMany('App\ProductVariant');
    }
}
