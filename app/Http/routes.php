<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::auth();

Route::get('/', 'HomePageController@index');
Route::get('/home', 'HomePageController@index');

Route::post('/','HomePageController@postIndex');

Route::get('/login',function(){

	return view('auth.login');
});

Route::get('/register',function(){

	return view('auth.register');
});

Route::get('/services/one-on-one/live-blood-analysis/', function(){
	return view('services.livebloodanalysis');
});

Route::get('/services/one-on-one/workshops/', function(){
	return view('services.workshops');
});

Route::get('/services/one-on-one/intuitive-counseling/', function(){
	return view('services.intuitivecounseling');
});

Route::get('/services/one-on-one/reiki-and-energy/', function(){
	return view('services.reikienergy');
});

Route::get('/videos','VideoController@index');
Route::post('/videos','VideoController@postIndex');





Route::get('/logout', function()
    {
        Auth::logout();
    	Session::flush();
        return Redirect::to('/');
    });

//this checks if they are a regular registered user
Route::group(['middleware' => ['auth']], function(){  //regular user 

	Route::get('/areyouloggedin', 'UserController@index');


});

//this checks if they are a admin user
Route::group(['middleware' =>['AdminOnly']],function(){ //admin user

	Route::get('/admin', 'UserController@index');

	// this is experimenting with the program product
	Route::get('/products/buyprogram', 'UserController@product');

		
	

});




/*
|--------------------------------------------------------------------------
| shopping Routes
|--------------------------------------------------------------------------
|
|
*/


Route::get('/shop', [
	'uses'=>'productController@getIndex',
	'as' => 'product.index'

]);






Route::group([
	'prefix' => 'user'], function(){


		Route::group(['middleware' => 'auth'], function(){  

			route::get('areyouloggedin',function(){

				echo "You are an authenticated user";

			});

			Route::get('profile', [
				'uses'=>'userController@getProfile',
				'as' => 'user.profile'

			]);

			route::get('logout', [
				'as' => 'user.logout',
				'uses'=>'userController@getLogout',
			]);

		});

		Route::group(['middleware' => 'guest'], function(){  

			Route::get('signup', [
				'uses'=>'userController@userSignup',
				'as' => 'user.signup'
			    
			]);

			Route::post('signup', [
				'uses'=>'userController@postSignup',
				'as' => 'user.signup'
			  
			]);

			Route::get('signin', [
				'uses'=>'userController@userSignin',
				'as' => 'user.signin'
			    
			]);

			Route::post('signin', [
				'uses'=>'userController@postSignin',
				'as' => 'user.signin'
			  
			]);



		});

			

	});  
// end prefix

Route::post('/add-to-cart/', [
		'uses' => 'productController@getAddToCart',
		'as' =>'product.addToCart'

]);

Route::get('/reduce/{id}', [
		'uses' => 'productController@getReduceByOne',
		'as' =>'product.subtractFromCart'

]);

Route::get('/delete/{id}', [
		'uses' => 'productController@getRemoveItem',
		'as' =>'product.removeFromCart'

]);

Route::get('/shopping-cart/', [
		'uses' => 'productController@getShoppingCart',
		'as' =>'product.getShoppingCart'

]);

Route::get('/checkout',[
	'uses'=> 'productController@getCheckout',
	'as' =>'checkout',
	'middleware' => 'auth'
]);

Route::post('/checkout',[
	'uses'=> 'productController@postCheckout',
	'as' =>'checkout',
	'middleware' => 'auth'
]);




// -------------------------- ADMIN

Route::get('/admin',[
			'uses'=> 'adminController@getIndex',
			'as' =>'admin.index',
			
		]);

Route::group([
	'prefix' => 'admin'], function(){

		Route::get('/admin_add_product',[
			'uses'=> 'adminController@getAddProduct',
			'as' =>'admin.add.product',
			
		]);		

		Route::post('/admin_add_product',[
			'uses'=> 'productController@postAddProductInventory',
			'as' =>'admin.add.product',
			
		]);

		
		Route::get('/admin_view_products/{columnname}/{sortmethod}',[
			'uses'=> 'adminController@getViewProducts',
			'as' =>'admin.view.products',
			
		]);

		Route::get('/admin_single_product/{id}',[
			'uses'=> 'adminController@getSingleProduct',
			'as' =>'admin.single.product',
			
		]);

		Route::post('/admin_single_product/{id}',[
			'uses'=> 'productController@postUpdateProduct',
			'as' =>'admin.single.product',
			
		]);

		Route::post('/admin_delete_product/', [
			'uses'=> 'adminController@adminDeleteProduct',
			'as' =>'admin.delete.product',	
		]);

		Route::post('/admin_delete_single_associated_image', [
			'uses'=> 'adminController@adminDeleteSingleAssociatedImage',
			'as' =>'delete.single.associated.image',	
		]);

		Route::get('/test',[
			'uses'=> 'productController@test',
			'as' =>'test',	
		]);


	});  

// this route will display the storage images 
Route::get('storage/{filename}', function ($filename)
{
    return Image::make(storage_path('app/public/productimages/' . $filename))->response();
});
