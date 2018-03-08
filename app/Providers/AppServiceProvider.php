<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;
use Illuminate\Support\Facades\Input;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         Validator::extend('upload_count', function($attribute, $value, $parameters, $number)
            {   
                // $test =$number->customMessages->images_allowed;
                if($number->getCustomMessages()){
                    $number = $number->getCustomMessages()['images_allowed'];
                } else {
                    $number = 4;
                }       
                          

                $files = Input::file('alternativeimages');
                //  if ($number == 0 ){
                //     return true;
                // }    
                return ((count($files)-1) < $number) ? true : false;

            });

         
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
