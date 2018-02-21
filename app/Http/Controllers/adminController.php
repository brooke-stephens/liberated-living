<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class adminController extends Controller
{
    public function getIndex(){
    	return view('admin.index');
    }

    public function getAddProduct(){
    	return view('admin.add_product');
    }
}



