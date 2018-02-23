<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use App\ProductImage;
use Image;
use Storage;

class adminController extends Controller
{
    public function getIndex(){
    	return view('admin.index');
    }

    public function getAddProduct(){
    	return view('admin.add_product');
    }

    public function getViewProducts(){

    	$products = Product::all();
    	$images = ProductImage::where('isprimaryimage', '1')->get();
       	// $images = ProductImage::all();

    	// $contents = Storage::get('/public/productimages/3b83d70251f48a43fcd3a60c7b60dd2e.jpg');
    	// dd(ProductImage::find(1));
    	// $path = storage_path().'/public/productimages/';
    	// dd($images);

    	return view('admin.view_products', [
    		'products' => $products,	
    		'images' => $images

    	]);

    	// return view('admin.view_products')->with([
    	// 	'products' => $products,	
    	// 	'images' => $images
    	// ]);

    	
    }

    public function getSingleProduct($id){

    	$product = Product::find($id);
    	// $images = ProductImage::find($id);
    	$primaryImages = ProductImage::where('product_id', $id)->where('isprimaryimage', '1')->get();
    	$AssociatedImages = ProductImage::where('product_id', $id)->where('isprimaryimage', '0')->get();

    	// foreach ($AssociatedImages as  $image) {
    	// 	echo $image->name;
    	// }

    	// $primaryImage = ProductImage::find($id)->where('isprimaryimage', '1')->pluck('name');
    	
    	// dd($images->name->where('isprimaryimage', '1'));


    	return view('admin.view_single_product',[
    		'product' => $product,
    		'primaryImage' => $primaryImages,
    		'associatedImages' => $AssociatedImages
    	]);

    }
}



