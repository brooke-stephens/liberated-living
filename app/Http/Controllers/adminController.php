<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use App\ProductVariant;
use App\ProductImage;
use Image;
use Storage;
use Illuminate\Support\Facades\Schema;
use DB;

class adminController extends Controller
{
    public function getIndex(){
    	return view('admin.index');
    }

    public function getAddProduct(){
    	return view('admin.add_product');
    }

    public function getViewProducts($columnname, $sortmethod){
        //{{ $products->links() }}
       	// $products = Product::all();
           
    	$images = ProductImage::where('isprimaryimage', '1')->get();
       	// $images = ProductImage::all();

    	// $contents = Storage::get('/public/productimages/3b83d70251f48a43fcd3a60c7b60dd2e.jpg');
    	// dd(ProductImage::find(1));
    	// $path = storage_path().'/public/productimages/';
    	// dd($images);
        $sortmethod == "asc";

        //Default listing
        $products = Product::paginate(15);  

        if ($sortmethod == "asc"){
            $sortmethod = "desc";
        } else {
            $sortmethod = "asc";
        }

        if(!Schema::hasColumn('products', $columnname)){
             $columnname = 'title';
        }


        $products = Product::orderBy($columnname,$sortmethod)->paginate(25);
        

    	return view('admin.view_products', [
    		'products' => $products,	
    		'images' => $images,
            'sortmethod' => $sortmethod,
            'columnname'=> $columnname,

    	]);

    	// return view('admin.view_products')->with([
    	// 	'products' => $products,	
    	// 	'images' => $images
    	// ]);

    	
    }

    public function getSingleProduct($id){

    	$product = Product::find($id);
        $productVariants = ProductVariant::where('product_id', $id)->get();
    	// $images = ProductImage::find($id);
    	$primaryImages = ProductImage::where('product_id', $id)->where('isprimaryimage', '1')->get();
    	$AssociatedImages = ProductImage::where('product_id', $id)->where('isprimaryimage', '0')->get();



        if (!$productVariants->isEmpty()) { 
           $multipleVariants = 'checked';
        } else {
           $multipleVariants = "";
        }

    	// foreach ($AssociatedImages as  $image) {
    	// 	echo $image->name;
    	// }

    	// $primaryImage = ProductImage::find($id)->where('isprimaryimage', '1')->pluck('name');
    	
    	// dd($images->name->where('isprimaryimage', '1'));

    	return view('admin.view_single_product',[
    		'product' => $product,
            'productVariants' => $productVariants,
            'multipleVariants' => $multipleVariants,
    		'primaryImage' => $primaryImages,
    		'associatedImages' => $AssociatedImages
    	]);

    }

    public function adminDeleteProduct(Request $request){


        // dd($request->productId);
        $image = ProductImage::where('product_id', 13)->first();
        // dd($product->title);

        $id = $request->productId;
        $primaryimagename = ProductImage::where('product_id', $id)->where('isprimaryimage', 1)->first();
        $allimages = ProductImage::where('product_id', $id)->get();

        Product::destroy($id);        
        // $imagesToDelete = ProductImage::where('product_id', $id)->get();
        DB::table('product_images')->where('product_id', $id)->delete(); 
        // dd($alternativeimagenames);

        if ($primaryimagename){
            $name = "srv/productthumbnails/$primaryimagename->name";
            unlink($name);
        }       

        if ($allimages){
            foreach ($allimages as $image){
                // Storage::delete($image->name);
                $storagepath = "public/productimages/$image->name";
                Storage::delete($storagepath, $image->name);
            }
        }

    }




}



