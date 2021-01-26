<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\facades\Socialite;

class FaceController extends Controller
{
    public function redirect($service){

    	return Socialite::driver($service)->redirect(); 
    }
      public function callback($service,Request,$request){

    	 $user = Socialite::with($service);
    	 return response() -> json($user); 
    }
}
