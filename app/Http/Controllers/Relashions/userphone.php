<?php

namespace App\Http\Controllers\Relashions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Phone;
use App\User;


class userphone extends Controller
{
    public function getphone(){
       
       $user = User::with(['phone' => function ($e) {
            $e->select('code', 'phone', 'user_id');// must choose user_id with any data you need;
        }])->find(2);
       $user -> makeHidden(['created_at','updated_at','email_verified_at']);
       $user -> makeVisible(['id']);
        
       // return $user ->phone->phone;
    	return $user;	

    }
    public function getuser(){

       $phone = Phone::find(1);

       // return $phone -> user;      
        $phone = Phone::with(['User' => function($e){
       	$e->select('name','id');// must choose id with any data you need;
        }])->find(2);
        $phone -> makeHidden(['code','id']);
        $phone -> makeVisible(['user_id']);

       return response() -> json($phone);	
    }

    public function getuserhasphone(){
      
      $user = User::whereHas('Phone',function($cond){
      	$cond -> where('code',2);
      })->get();
      // $user = User::whereHas('Phone')->get();
      // $user = User::whereDoesntHave('Phone')->get();
      $user -> makeHidden(['created_at','updated_at','email_verified_at','expire']);

       return response() -> json($user);	
    }
    public function hasMany(){
    
      // $user = User::with('Phone')->find(2);
      $user = User::find(2);
      // return $user;
      // return $user->phone;
      $user -> makeHidden(['created_at','updated_at','email_verified_at','expire','mobile']);
       $data =  $user->phone;
      foreach ($data as $names) {
      		echo $names->phone."<br>";	
      	};
    }

}
