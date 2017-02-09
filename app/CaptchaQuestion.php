<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaptchaQuestion extends Model
{

	public static $rules = [
		'name'=>'required | max:30 | min:2',
    	'email' => 'required | email',
    	'message' => 'required',
    	'subject' => 'required | max:35 | min:4',
    	// 'questioninput' => 'required | integer'

	];

	public static $capthaquestions = array(
				'5+5+5',
				'10-2+2',
				'15+5',
				'3+2+2'
				);

    public static function getQuestion(){

    	return self::$capthaquestions[array_rand(self::$capthaquestions, 1)];

    }
}
