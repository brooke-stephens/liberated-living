<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

use App\Http\Requests;
use App\CaptchaQuestion;
use Validator;
use Mail;
use Redirect;



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
			return Redirect::to(URL::previous() . "#section-5")
				->withInput($request->input())
				->withErrors($this->messages);
		} else {

			$this->sendEmail($request);
		}



    }

    public function sendEmail(Request $request){

    	 $data = [
       	'sitename' 	=> "liberatedliving.ca",
       	'message'   => $request->message,
       	'emailto'	=> 'mark2002david@hotmail.com',
    	'emailfrom' => $request->email,
    	'Namefrom'	=> $request->name,
    	'subject'	=> 'Liberated Living contact form submission',
    	'body' 		=> $request->message,
  		  ];

  		// where the email layout file is --- the data being sent to the view 
  		 Mail::send('email.email_layout', $data, function($message) use ($data) {

  		 	$message->from($data['emailfrom'], $data['Namefrom']);
  		 	$message->to($data['emailto']);
  		 	$message->subject($data['subject']);

  		 });


    	 $this->emailSuccess();

    }

    public function emailSuccess(){

      notify()->flash("Email Sent.", "success");

      //return redirect('/');
      //return Redirect::to('/')
      Redirect::to('/')->send(); //the other redirect werent redirecting
    }

    
}
