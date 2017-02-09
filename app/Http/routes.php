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

Route::post('/#contact-me','HomePageController@index');



