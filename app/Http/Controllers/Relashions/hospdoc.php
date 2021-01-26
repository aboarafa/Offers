<?php

namespace App\Http\Controllers\Relashions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hospital;
use App\Models\Doctor;
use App\Models\Service;

class hospdoc extends Controller
{
    public function hosp()
    {
        $hospitals = Hospital::all();
        // return $hospitals;
	    $hospitals = Hospital::with('doctors')->find(1);
	    // $doctors   = $hospitals->doctors;
     //        foreach ($doctors as $names) {
     //           echo $names->name."<br>" ; 
     //    }
        $doctors = Doctor::find(5);
            return $doctors -> hospitals;    
    }
    public function hospitals()
    {
	  $hospitals = Hospital::select('id','name','adress')->get();
	  return view('/relashions.hospitals',compact('hospitals'));
    }
    public function doctors($hospital_id)
    {
    	$hospitals = Hospital::find($hospital_id);
    	$doctors = $hospitals-> doctors;
    	return view('/relashions.doctors',compact('doctors'));
    }
    public function services()
    {
        $doctors  = Doctor::find(11);
        $services = $doctors -> services;
     return view('/relashions.services',compact('services'));
    }
    public function hasdocsmale(){
        $hospitals = Hospital::with('doctors')->whereHas('doctors',function($e){
        	$e->where('gender','ذكر');
        })->get();
    	return $hospitals;
    }
    public function delhos($hospital_id){
    	$hospitals = Hospital::find($hospital_id);
    	$hospitals ->doctors()->delete();
    	$hospitals ->delete();
    	return redirect()->back();
    }
}
