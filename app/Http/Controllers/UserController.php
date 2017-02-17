<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

use App\Services\Product;
use Auth;
use App\User;
use DB;




class UserController extends Controller

{

  
  


  public function index(){
      $user = Auth::user();
      echo $user->permission->permission_level;

  }

  public function product(){
  	// getenv('STRIPE_API');
  	return view('products.program1');
  	//Product::test();
  }

    


    

    
}
