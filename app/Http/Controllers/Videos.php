<?php

namespace App\Http\Controllers;

use App\Events\videoviewer;
use App\Models\Video;
use Illuminate\Http\Request;

class Videos extends Controller
{
    public function getvideos(){
    	
       $video =  Video::first();
       event(new videoviewer($video));
       return view('videos')->with('video',$video);
    	 
    }  
}
