<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = ['name','qesm','hospital_id'];
    protected $hidden   = ['hospital_id','created_at','updated_at'];
    public $timestamps  = false;

    public function hospitals(){

     return $this -> belongsTo('App\Models\Hospital','hospital_id');
   }
    public function services(){

      return $this -> belongsToMany('App\Models\Service','doctor_services','doctor_id','service_id','id','id');
   }
   
}
