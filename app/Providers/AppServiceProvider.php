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
   
          Validator::extendImplicit('primary_count', function ($attribute, $value, $parameters, $number) {
                                        
             
                $number = $number->getCustomMessages()['needs_primary']; 
                 if (Input::hasfile('primaryimage')){
                    return $number;
                 }  else {
                    return true;
                 }    
                   
                
               

            });

        Validator::extend('upload_count', function($attribute, $value, $parameters, $number)
            {   
                // $test =$number->customMessages->images_allowed;
                if($number->getCustomMessages()){
                    $number = $number->getCustomMessages()['images_allowed'];
                } else {
                    $number = 3;
                }       
                          

                $files = Input::file('alternativeimages');

                // If no input than allow the update function to go through  
                if (!Input::hasfile('alternativeimages')){
                    return true;
                 }  

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
