<?php 

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

use App\Http\Requests;
use App\CaptchaQuestion;
use Validator;
use Mail;
use Redirect;

class Email {

	public $messages;

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
			// Redirect::to('/')->send();
			return Redirect::to("/#contact-me")->send()
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
      'emailto'	=> 'susan@liberatedliving.ca',
    	'emailfrom' => $request->email,
      'clientsubject' => $request->subject,
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

    public function displayCaptcha(){

    	return CaptchaQuestion::getQuestion();

    }

    public static function getSubject(Request $request){

        

        // if (isset($_SERVER['HTTP_REFERER'])){
            
        //   $url = $_SERVER['HTTP_REFERER'];
        //   $parts = explode("/", $url);
        //   $subject = $parts[5];
        //   $subject = ucwords(str_replace('-', ' ',  $subject));

        //      switch ($subject) {
        //         case 'Reiki And Energy':
        //             dd('asfasf');
        //         break;
        //         case 'Live Blood Analysis':
        //             dd('asfasf');
        //         break;
        //         case 'Reiki And Energy':
        //             dd('asfasf');
        //         break;
        //         case 'Reiki And Energy':
        //             dd('asfasf');
        //         break;
               
        //     }
        // }


    }
	

}