<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\Product;
use App\ProductImage;
use App\Cart;
use Session;
use Auth;
use App\Order;
use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Support\Facades\Input;
use Image;
use Storage;
use DB;


class productController extends Controller
{
    public function getIndex() {
                    // Test database connection
            try {
                DB::connection()->getPdo();
            } catch (\Exception $e) {
                die("Could not connect to the database.  Please check your configuration.");
            }
    	$products = Product::all();
    	return view('shopviews.index', [
    		'products' => $products,	
    	]);
    }

    public function getAddToCart(Request $request, $id){

    	$product=Product::find($id);
    	$oldCart = Session::has('cart') ? Session::get('cart') : null;
    	
    	$cart = new Cart($oldCart);
    	$cart->add($product, $product->id );

    	$request->session()->put('cart',$cart);
    	// dd ($request->session()->get('cart'));
    	return redirect()->route('product.index');
    }

    public function getReduceByOne($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->route('product.getShoppingCart');
    }

    public function getRemoveItem($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect()->route('product.getShoppingCart');
    }


    public function getShoppingCart(){

    	if (!Session::has('cart')) {
    		return view('shopviews.shopping-cart',[
    			'products' => null,
    		]);
    	} else {
    		// you could use the oldCart variable directly but this way would be better for future functiobnality to create a new object
    		$oldCart = Session::get('cart');
    		$cart = new Cart($oldCart);    		
    		return view('shopviews.shopping-cart',[
    			'products' => $cart->items,
    			'totalPrice' => $cart->totalPrice,
    		]);	
    	}
    }

    public function getCheckout(){

    	if (!Session::has('cart')) {
    		return view('shopviews.shopping-cart',[
    			'products' => null,
    		]);
    	} 
    		$oldCart = Session::get('cart');
    		$cart = new Cart($oldCart);
    		$total = $cart->totalPrice;
    		return view('shopviews.checkout',[
    				'total' => $total 
    		]);
    	
    }

    public function postCheckout(Request $request){

      	if (!Session::has('cart')) {
            return redirect()->route('shopviews.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        //perhaps use from ENV

        Stripe::setApiKey('sk_test_uV4yUZgUOsfz7qMNvpXjZExh');
        try {

            $charge = Charge::create(array(
              "amount" => $cart->totalPrice * 100,
              "currency" => "cad",
              "source" => $request->input('stripeToken'), 
              "description" => "Test Charge"
            ));

            $order = new Order();
            // $order->cart  -- cart relates to the tablename in the database
            $order->cart = serialize($cart); 
            $order->name = $request->name; 
            $order->address = $request->address; 
            $order->payment_id = $charge->id; 

            Auth::user()->orders()->save($order);

        } catch(\Exception $e) {
            return redirect()->route('checkout')->with('error', $e->getMessage() );
        }

        //may need to store in the database
        Session::forget('cart');
         return redirect()->route('product.index')->with('success', 'Successfully Purchased');
    }


    public function postAddProductInventory(Request $request){
       

        $this->validate($request,[
            'name' => 'required|min:4',
            'description' => 'required|min:4',
            'sku' => 'required|min:4',
            'category' => 'required|min:3',
            'primaryimage' => 'required|mimes:jpeg,bmp,png|max:5000',
            'alternativeimages' => 'upload_count',
            'alternativeimages.*' => 'mimes:jpeg,bmp,png|max:5000',
            'price' => 'required|numeric|min:1',
            'quantity' => 'required|numeric|min:1',

        ]);

        // $safeName = uniqid(date('Y-m-d_H-i-s')).'.jpg';
        // $primaryimage = $request->primaryimage;
       
        // $resizedimage = Image::make($file)->resize(200,200);
        // $resizedimage->save($path.'bar.jpg');

        if(Input::hasfile('primaryimage')){
            $file = request()->file('primaryimage');
            $resize = Image::make($file)->fit(300)->encode('jpg');
            // calculate md5 hash of encoded image
            $hash = md5($resize->__toString());
            // use hash as a name
            $publicpath = "srv/productimages/{$hash}.jpg";
            $storagepath = "public/productimages/{$hash}.jpg";
            // save it locally to ~/srv/productimages/{$hash}.jpg
            // $resize->save(public_path($path));
            //save the file to the storage directory
            Storage::put($storagepath, $resize->__toString());
        }    

        //Keep in mind that file extension may be different, check uploaded file
        // $safeName = uniqid(date('Y-m-d_H-i-s')).'.jpg';
       
        

    

        // dd($request->get('description'));

        // $new_product = new Product([
        //     'title' => $request->name,
        //     'description' => $request->get('description'),
        //     'sku' => $request->sku,
        //     'category' => $request->category,
        //     'imagePath' => $request->image,
        //     'price' => $request->price,
        //     'quantity' => $request->quantity,
        // ]);


        $new_product = new Product;
        $new_product->title = $request->name;
        $new_product->description = $request->description;
        $new_product->sku = $request->sku;
        $new_product->category = $request->category;
        $new_product->price = $request->price;
        $new_product->quantity = $request->quantity;
        $new_product->save();


        $new_productImage = new ProductImage;
        $new_productImage->product_id = $new_product->id;
        $new_productImage->name = "{$hash}.jpg";
        $new_productImage->isprimaryimage = 1;
        $new_productImage->save();

        if(Input::hasfile('alternativeimages')){
            $images = Input::file('alternativeimages');
            foreach ($images as $image) {
               // $image = $request->file('images');
                $resize = Image::make($image)->fit(300)->encode('jpg');
                // calculate md5 hash of encoded image
                $hash = md5($resize->__toString());
                // use hash as a name
                $publicpath = "srv/productimages/{$hash}.jpg";
                $storagepath = "public/productimages/{$hash}.jpg";
                // save it locally to ~/srv/productimages/{$hash}.jpg
                // $resize->save(public_path($path));
                //save the file to the storage directory
                Storage::put($storagepath, $resize->__toString());


                $new_productImage = new ProductImage;
                $image->name = "{$hash}.jpg";
                $new_productImage->product_id = $new_product->id;
                $new_productImage->name = $image->name;
                $new_productImage->isprimaryimage = 0;
               // $image->move('srv/productimages/',$image->name);
               // $imagePathArray[] = $image->path;
                $new_productImage->save();
            }
        }


        
       



        
    }


}
