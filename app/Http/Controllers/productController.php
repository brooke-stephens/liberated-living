<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\Product;
use App\ProductImage;
use App\ProductVariant;
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
use Redirect;
use XeroPHP\Application\PrivateApplication;

class productController extends Controller
{

    public $hash;

    public function getIndex() {
                    // Test database connection
         
    	$products = Product::all();
        $productvariants = ProductVariant::all();
       
    	return view('shopviews.index', [
    		'products' => $products,
            'productvariants' => $productvariants,	
    	]);
    }

    public function getAddToCart(Request $request){
        
        $id = $request->subproduct;
    	// $product=Product::find($id);
        $product=ProductVariant::find($id);

        if (!isset($request->subproduct)){
            $id = $request->id;
            $product=Product::find($id);
        }

    	$oldCart = Session::has('cart') ? Session::get('cart') : null;
    	
    	$cart = new Cart($oldCart);
    	$cart->add($product, $product->sku );

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
            $allproducts = Product::all();
    		$oldCart = Session::get('cart');
    		$cart = new Cart($oldCart);    	
    		return view('shopviews.shopping-cart',[
    			'products' => $cart->items,
    			'totalPrice' => $cart->totalPrice,
                'allProducts' => $allproducts
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
            $order->firstname = $request->firstname; 
            $order->lastname = $request->lastname;
            $order->addresslineone = $request->addresslineone; 
            $order->addresslinetwo = $request->addresslinetwo; 
            $order->city = $request->city;
            $order->province = $request->province; 
            $order->postalcode = $request->postalcode; 
            $order->phonenumber = $request->phonenumber;  
            $order->payment_id = $charge->id; 

            Auth::user()->orders()->save($order);

        } catch(\Exception $e) {
            return redirect()->route('checkout')->with('error', $e->getMessage() );
        }

        //may need to store in the database
        Session::forget('cart');
         return redirect()->route('product.index')->with('success', 'Successfully Purchased');
    }

    public function getProduct($id){
        return Product::find($id);
    }

    public function savePrimaryImage(Request $request){

        if(Input::hasfile('primaryimage')){       

            $file = request()->file('primaryimage');
            $resize = Image::make($file)->fit(300)->encode('jpg');
            $thumbnail = Image::make($file)->fit(50)->encode('jpg');
            // calculate md5 hash of encoded image
            // $hash = md5($resize->__toString());
            $this->hash = md5($resize. time());
            
            // use hash as a name
            $publicpath = "srv/productthumbnails/{$this->hash}.jpg";
            $storagepath = "public/productimages/{$this->hash}.jpg";

            // save it locally to ~/srv/productimages/{$hash}.jpg
            $thumbnail->save(public_path($publicpath));
            Storage::put($storagepath, $resize);
            //save the file to the storage directory            
            // Storage::put($storagepath, $resize->__toString()); 
        } else {
            return false;
        }        
    }

    public function saveAssociatedImage(Request $request,$id){

        if(Input::hasfile('alternativeimages')){
            $images = Input::file('alternativeimages');
            foreach ($images as $image) {
               // $image = $request->file('images');
                $resize = Image::make($image)->fit(300)->encode('jpg');
                // calculate md5 hash of encoded image
                // $hash = md5($resize->__toString());
                $hash = md5($resize. time());
                // use hash as a name
                // $publicpath = "srv/productimages/{$hash}.jpg";
                $storagepath = "public/productimages/{$hash}.jpg";
                // save it locally to ~/srv/productimages/{$hash}.jpg
                // $resize->save(public_path($path));
                //save the file to the storage directory
                Storage::put($storagepath, $resize->__toString());


                $new_productImage = new ProductImage;
                $image->name = "{$hash}.jpg";
                $new_productImage->product_id = $id;
                $new_productImage->name = $image->name;
                $new_productImage->isprimaryimage = 0;
               // $image->move('srv/productimages/',$image->name);
               // $imagePathArray[] = $image->path;
                $new_productImage->save();
            }
        }

    }




    public function postAddProductInventory(Request $request){      

        // dd($request->all());

        if($request->multiplevariants){            
            $this->validate($request,[ 
                'name' => 'required|min:4',
                'description' => 'required|min:4',
                'sku' => 'required|min:4',
                'category' => 'required|min:3',
                'primaryimage' => 'required|mimes:jpeg,bmp,png|max:5000',
                'alternativeimages' => 'upload_count',
                'alternativeimages.*' => 'mimes:jpeg,bmp,png|max:5000',           
                'vsize.*' => 'required|min:1',
                'vprice.*' => 'required|numeric|min:1|regex:/^\d*(\.\d{1,2})?$/',
                'vquantity.*' => 'required|numeric|min:1',
                'vsku.*' => 'required|min:4',                          
                 ]);             
        } else {
            $this->validate($request,[
                'name' => 'required|min:4',
                'description' => 'required|min:4',
                'sku' => 'required|min:4',
                'category' => 'required|min:3',
                'primaryimage' => 'required|mimes:jpeg,bmp,png|max:5000',
                'alternativeimages' => 'upload_count',
                'alternativeimages.*' => 'mimes:jpeg,bmp,png|max:5000',
                'size' => 'required|min:1',
                'price' => 'required|numeric|min:1|regex:/^\d*(\.\d{1,2})?$/',
                'quantity' => 'required|numeric|min:1',
            ]);
        }

      
        $new_product = new Product;
        $new_product->title = $request->name;
        $new_product->description = $request->description;
        $new_product->sku = $request->sku;
        $new_product->category = $request->category;
        $new_product->price = $request->price;
        $new_product->quantity = $request->quantity;
        $new_product->size = $request->size;
        $new_product->save();
       
        if($request->vsku){
            $length = count($request->vsku);
            for ($i = 0; $i < $length; $i++) {
                $new_productVariant = new productVariant;
                $new_productVariant->sku = $request->vsku[$i];           
                $new_productVariant->size = $request->vsize[$i];
                $new_productVariant->quantity = $request->vquantity[$i];
                $new_productVariant->price = $request->vprice[$i];
                $new_productVariant->product_id = $new_product->id;
                $new_productVariant->save();
            }
        }


        // $resizedimage = Image::make($file)->resize(200,200);
        // $resizedimage->save($path.'bar.jpg');

        $this->savePrimaryImage($request);   
        $new_productImage = new ProductImage;
        $new_productImage->product_id = $new_product->id;
        $new_productImage->name = "{$this->hash}.jpg";
        $new_productImage->isprimaryimage = 1;
        $new_productImage->save();


        $this->saveAssociatedImage($request, $new_product->id);

        notify()->flash("Product Created.", "success");
        return redirect()->route('admin.add.product');
      
    }

     public function checkValidation(Request $request, $id){
        //error messages are stored in validation
        //this custom rule is in the app service providor

         //checkifthere is a primaryimage in the database
        $isprimaryimage = ProductImage::where('product_id', $id)->where('isprimaryimage', 1)->get();

        if (!$isprimaryimage->isEmpty()){
            $needsPrimary = false;  
        } else {
            $needsPrimary = true;  
        }
        //checkhowmany associated images there are and send the limit to the validation
        $isassociatedimage = ProductImage::where('product_id', $id)->where('isprimaryimage', 0)->get();


        if (!$isassociatedimage->isEmpty()){
            $numberImageAllowed = 4 - $isassociatedimage->count();            
        } else {
            $numberImageAllowed = 4;
        }

 
        $number = [
            'images_allowed' => $numberImageAllowed,
            'needs_primary' => $needsPrimary,
            
        ];



        if($request->multiplevariants){            
            $this->validate($request,[
                'name' => 'required|min:4',
                'description' => 'required|min:4',
                'sku' => 'required|min:4',
                'category' => 'required|min:3',
                'primaryimage' => 'primary_count|mimes:jpeg,bmp,png|max:5000', 
                'alternativeimages' => 'upload_count',
                'alternativeimages.*' => 'mimes:jpeg,bmp,png|max:5000',           
                'vsize.*' => 'required|min:1',
                'vprice.*' => 'required|numeric|min:1|regex:/^\d*(\.\d{1,2})?$/',
                'vquantity.*' => 'required|numeric|min:1',
                'vsku.*' => 'required|min:4',                          
                 ],$number);             
        } else {
            $this->validate($request,[
                'name' => 'required|min:4',
                'description' => 'required|min:4',
                'sku' => 'required|min:4',
                'category' => 'required|min:3',
                'primaryimage' => 'primary_count|mimes:jpeg,bmp,png|max:5000',           
                'alternativeimages' => 'upload_count',
                'alternativeimages.*' => 'mimes:jpeg,bmp,png|max:5000',
                'size' => 'required|min:1',
                'price' => 'required|numeric|min:1|regex:/^\d*(\.\d{1,2})?$/',
                'quantity' => 'required|numeric|min:1',
            ],$number);
        }
     }

     public function postUpdateProduct(Request $request, $id){

            // dd($request->all());
        // $this->checkValidation($request);

       // DB::table('product_images')->where('product_id', $id)->delete(); 

        $this->checkValidation($request, $id);
        $this->saveAssociatedImage($request, $id);
        if(Input::hasfile('primaryimage')){
            $this->savePrimaryImage($request);   
            $new_productImage = new ProductImage;
            $new_productImage->product_id = $id;
            $new_productImage->name = "{$this->hash}.jpg";
            $new_productImage->isprimaryimage = 1;
            $new_productImage->save();
        }

        if(!$request->multiplevariants){
            
            DB::table('product_variants')->where('product_id', $id)->delete(); 
            $updated_product = Product::find($id);
            $updated_product->title = $request->name;
            $updated_product->description = $request->description;
            $updated_product->sku = $request->sku;
            $updated_product->category = $request->category;

            $updated_product->size = $request->size;
            $updated_product->price = $request->price;
            $updated_product->quantity = $request->quantity;
            $updated_product->save();
        } else {

            $updated_product = Product::find($id);
            $updated_product->title = $request->name;
            $updated_product->description = $request->description;
            $updated_product->sku = $request->sku;
            $updated_product->category = $request->category;
            $updated_product->size = "";
            $updated_product->price = "";
            $updated_product->quantity = "";
            $updated_product->save();

            DB::table('product_variants')->where('product_id', $id)->delete();   

            if($request->vsku){
            $length = count($request->vsku);
                for ($i = 0; $i < $length; $i++) {
                    $new_productVariant = new productVariant;
                    $new_productVariant->sku = $request->vsku[$i];           
                    $new_productVariant->size = $request->vsize[$i];
                    $new_productVariant->quantity = $request->vquantity[$i];
                    $new_productVariant->price = $request->vprice[$i];
                    $new_productVariant->product_id = $updated_product->id;
                    $new_productVariant->save();
                }
            }
        }   


       

    

      //return redirect('/');
      //return Redirect::to('/')
      // return redirect()->route('admin.single.product',[$id]);
      notify()->flash("Product Updated.", "success"); 
      Redirect::to("/admin/admin_single_product/$id")->send(); //the other redirect werent 
        

    }    

    public function test(){

        
        $privatekeypath = 'file:///'.base_path('vendor/drawmyattention/xerolaravel/Certificates/privatekey.pem');
        $publickeypath  = 'file:///'.base_path('vendor/drawmyattention/xerolaravel/Certificates/publickey.cer');  

        $config = [

            'xero' => [
                // API versions can be overridden if necessary for some reason.
                'core_version'     => '2.0',
                'payroll_version'  => '1.0',
                'file_version'     => '1.0'
            ],

            'oauth' => [
                'callback'    => 'oob',

                'consumer_key'      => 'NOOPO541NLB1WS0QVCSELNRSPTK65L',
                'consumer_secret'   => 'DIV2V3LEJGFSFN1XCWQMEBSFKJEWME',

                //If you have issues passing the Authorization header, you can set it to append to the query string
                //'signature_location'    => \XeroPHP\Remote\OAuth\Client::SIGN_LOCATION_QUERY


                //For certs on disk or a string - allows anything that is valid with openssl_pkey_get_(private|public)
                   //      'rsa_private_key'  => 'file://certs/private.pem',
                          // 'rsa_public_key'   => 'file://certs/public.pem'

                // 'rsa_private_key'  => 'file:///vagrant/sites/liberated-living/vendor/drawmyattention/xerolaravel/Certificates/privatekey.pem',
                // 'rsa_public_key'   => 'file:///vagrant/sites/liberated-living/vendor/drawmyattention/xerolaravel/Certificates/publickey.cer',
                'rsa_private_key'  => $privatekeypath,
                'rsa_public_key'   => $publickeypath,


            ],

            //These are raw curl options.  I didn't see the need to obfuscate these through methods
            'curl' => [
                CURLOPT_USERAGENT   => 'testapp',

                //Only for partner apps - unfortunately need to be files on disk only.
                //CURLOPT_CAINFO          => 'certs/ca-bundle.crt',

                //CURLOPT_SSLCERT         => 'certs/entrust-cert-RQ3.pem',
                //CURLOPT_SSLKEYPASSWD    => '1234',
                //CURLOPT_SSLKEY          => 'certs/entrust-private-RQ3.pem'

            ]
        ];




        $xero = new \XeroPHP\Application\PrivateApplication($config);

        $contacts = $xero->load('Accounting\\Item')->execute();
        $master = $xero->loadByGUID('Accounting\\Item', 'dfb6d3db-113c-4526-9614-a491e6b4b69b');
        // echo $master->name;

        // $master->name = 'New Name';
        // $xero->save($master);

        // $master->SalesDetails->UnitPrice = 10;
        // $xero->save($master);
        
        //QuantityOnHand


    //  $master->setStatus(Invoice::INVOICE_STATUS_DRAFT);
    // $xero->save($master);

            foreach ($contacts as $contact) {
              // dd($contact);
              // echo $contact->name.' '. $contact->SalesDetails->UnitPrice.'<br>';

                // $contact->setQuantityOnHand(1);
                // $xero->save($contact);

                echo $contact->getItemID();
                echo "<br>";
            }


        
    }


}
