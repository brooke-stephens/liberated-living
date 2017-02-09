<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

use App\Http\Requests;
use App\Services\Email;
use App\CaptchaQuestion;


class HomePageController extends Controller

{

  
  public function index(){    	
    	
    return view('index', [
    	'question' => CaptchaQuestion::getQuestion(),
      
    	]);

    }


  public function postIndex(Request $request){
    
    if (isset($request->appointmentsubject)){

      return view('index', [
      'question' => CaptchaQuestion::getQuestion(),  
      'subject' => $request->appointmentsubject,      
      ]);

      }else{

      $email = new Email();
      $email->isCaptchaValid($request);
    }


  }

    


    

    
}
