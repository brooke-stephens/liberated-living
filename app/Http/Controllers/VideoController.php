<?php

namespace App\Http\Controllers;


use Input;
 //instead of use Illuminate\Http\Request;
use Request;

class VideoController extends Controller
{
    public function index(){

    	return view('services.videos');

    }

    public function postIndex(){

    	
    	echo(Input::get('test'));
    	// echo(Input::get('id'));
    	// return view('services.videos');
    


    }	
}
