<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use App\ProductVariant;
use App\ProductImage;
use App\Category;
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
        $categories = Category::all();
    	return view('admin.add_product',[
            'categories' => $categories,
        ]);
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

    public function getProduct($id){
        return Product::find($id);
    }

    public function getProductVariants($id){
        return ProductVariant::where('product_id', $id)->get();
    }

    public function getPrimaryImage($id){
        return ProductImage::where('product_id', $id)->where('isprimaryimage', '1')->get();
    }

    public function getAssociatedImages($id){
        return ProductImage::where('product_id', $id)->where('isprimaryimage', '0')->get();
    }

    public function adminDeleteProduct(Request $request){


        // dd($request->productId);
        // $image = ProductImage::where('product_id', 13)->first();
        // dd($product->title);

        $id = $request->productId;
        $this->DeleteThumbnailImage($id);        
        $this->DeleteAllImages($id);  

        Product::destroy($id);        
        // $imagesToDelete = ProductImage::where('product_id', $id)->get();
        DB::table('product_images')->where('product_id', $id)->delete(); 
        // dd($alternativeimagenames);      

       

    }

    public function DeleteThumbnailImage($id){
         $primaryimagename = ProductImage::where('product_id', $id)->where('isprimaryimage', 1)->first();
         if ($primaryimagename){
            $name = "srv/productthumbnails/$primaryimagename->name";
            unlink($name);
         }  
    }

    public function DeleteAllImages($product_id){
        $allimages = ProductImage::where('product_id', $product_id)->get();
        if ($allimages){
            foreach ($allimages as $image){
                // Storage::delete($image->name);
                $storagepath = "public/productimages/$image->name";
                Storage::delete($storagepath, $image->name);
            }
        }
    }

    public function DeleteSingleImage($id){
         $singleImage = ProductImage::where('id', $id)->first();
        
         if ($singleImage){
             $storagepath = "public/productimages/$singleImage->name";
             Storage::delete($storagepath, $singleImage->name);
          } 

          if ($singleImage->isprimaryimage == 1) {
             $name = "srv/productthumbnails/$singleImage->name";
             unlink($name);
          } 
    }

    public function adminDeleteSingleAssociatedImage(Request $request){

      $associatedimage_id = $request->image_id;
      $this->DeleteSingleImage($associatedimage_id);
      ProductImage::destroy( $associatedimage_id );

    }

    public function getSingleProduct($id){
       

        $product = $this->getProduct($id);
        $productVariants = $this->getProductVariants($id);
    	$primaryImages = $this->getPrimaryImage($id);
    	$AssociatedImages = $this->getAssociatedImages($id);
        $categories = Category::all();




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
            'multipleVariantscheckbox' => $multipleVariants,
    		'primaryImage' => $primaryImages,
    		'associatedImages' => $AssociatedImages,
            'categories' => $categories,
    	]);

    }






}



