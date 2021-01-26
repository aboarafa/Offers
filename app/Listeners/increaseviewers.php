<?php

namespace App\Listeners;

use App\Events\videoviewer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class increaseviewers
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
           
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(videoviewer $event)
    {   
        if(!session()-> has('videovisited')){

             $this -> updateviewers($event -> video);
        }else{
            return false ;
        }
    }
    function updateviewers($video){
        
     $video -> viewers = $video -> viewers + 1;
     $video -> save() ;
     Session() -> put('videovisited' , $video -> id);
     

    }
}






