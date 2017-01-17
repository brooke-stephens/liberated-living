<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use Illuminate\Support\Facades\URL;

use App\Http\Requests;
use App\CaptchaQuestion;



class HomePageController extends Controller

{
	public $messages;

    public function index(){    	
    	
    	return view('index', [
    		'question' => $this->displayCaptcha(),
    		]);

    }

    public function displayCaptcha(){

    	return CaptchaQuestion::getQuestion();

    }

    public function isCaptchaValid(Request $request){

    	eval( '$result = (' . $request->question . ');' );

    	$validator = Validator::make($request->all(),CaptchaQuestion::$rules);
    	$this->messages = $validator->errors();
    	

    	// checks to see if the answer is the correct answer
    	if ($result != intval($request->questioninput)){
 			
			$this->messages->add('Captcha Question','Incorrect Captcha'); 
										
		}

		if ($this->messages->count()){

			// return redirect('/')
			return Redirect::to(URL::previous() . "#section-4")
				->withInput($request->input())
				->withErrors($this->messages);
		}

    }

    
}
