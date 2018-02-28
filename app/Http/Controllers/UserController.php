<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth;
use Session;

class UserController extends Controller
{
    public function userSignup(){
    	return view('user.signup');
    }

    public function userSignin(){
    	return view('user.signin');
    }

    public function getProfile(){
        $orders = Auth::user()->orders;
        $orders->transform(function($order, $key) {
            $order->cart = unserialize($order->cart);
            
            return $order;
        });

        return view('user.profile', ['orders' => $orders]);

    }

    public function postSignup(Request $request){

    	$this->validate($request,[
    		'email' => 'email|required|unique:users',
    		'password' => 'required|min:4'
    	]);

    	// dd($request->input('password'));

    	$user = new User([
    		'email' => $request->email,
    		'password' => bcrypt($request->input('password'))
    	]);

    	$user->save();
    	auth::login($user);

         if (Session::has('oldUrl')) { 
             $oldUrl = Session::get('oldUrl'); 
             Session::forget('oldUrl'); 
             return redirect()->to($oldUrl); 
            } 


    	return redirect()->route('user.profile');
    	
    }

     public function postSignin(Request $request){

    	$this->validate($request,[
    		'email' => 'email|required|',
    		'password' => 'required|min:4'
    	]);

    	if(Auth::attempt([
    		'email' => $request->email,
    		'password' => $request->input('password')
    	])){
            //Authenticate middle ware was updated. Will take user back to checkout page on a sign in.
            if (Session::has('oldUrl')) { 
             $oldUrl = Session::get('oldUrl'); 
             Session::forget('oldUrl'); 
             return redirect()->to($oldUrl); 
            } 


    		return redirect()->route('user.profile');
            
    	} 

    	return redirect()->back();
    	

    	
    	
    }

    public function getLogout() {	
    	Auth::logout();
		return redirect()->route('user.signin');
	
	}

  
}
