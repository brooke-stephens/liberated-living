<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   protected $fillable = ['title, description, price, sku, quantity, category'];

   public function product_images(){
        return $this->hasMany('App\ProductImage');
    }
}
