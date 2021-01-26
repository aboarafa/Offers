<?php

namespace App\Traits;

Trait  OfferTrait
{
    function saveImage($img,$folder)
    {
        //save photo in folder
        $imgext = $img -> getClientOriginalExtension();
        $imgname = time().'.'.$imgext;
        $path = $folder;
        $img -> move($path,$imgname);

        return $imgname;
    }
}
