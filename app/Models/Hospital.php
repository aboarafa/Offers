<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $fillable = ['name','adress'];
    protected $hidden   = ['created_at','updated_at'];
    public $timestamps  = false;
    

    public function doctors(){

     return $this -> hasMany('App\Models\Doctor','hospital_id');

   }
}
