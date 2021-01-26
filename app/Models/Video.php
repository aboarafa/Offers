<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    // protected $table    = $offers;
    protected $fillable    = ['name','viewers'];
    public    $timestamps  = false;

}
