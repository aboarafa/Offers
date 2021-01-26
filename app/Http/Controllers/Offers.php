<?php

namespace App\Http\Controllers;

use App\Traits\OfferTrait;
use App\Http\Requests\offerRequest;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use LaravelLocalization;

class Offers extends Controller
{   
    use OfferTrait;
	public function createajax()
	{
       return view('offersajax.createajax');
	}
	public function storeajax(offerRequest $request){

	 $imgname = $this -> saveImage($request-> img ,'images/offers');
          
       $offer =  Offer::create([

                    'title_ar'  => $request -> title_ar ,   
                    'title_en'  => $request -> title_en ,   
                    'details_ar'=> $request -> details_ar ,   
                    'details_en'=> $request -> details_en ,      
                    'price'     => $request -> price ,   
                    'img'       => $imgname ,   
        ]);
            return response()->json([
                'status' => true ,
                'msg' => 'your offer add successfully',  
            ]);
        }
    public function selectajax(){

      $selectall =  Offer::select('id','price','img','title_'. LaravelLocalization::getCurrentLocale(). ' as title','details_'.LaravelLocalization::getCurrentLocale(). ' as details')->get();
       return view('offersajax.showoffersajax',compact('selectall')); 
    }

    public function editeajax(Request $request){
        
       $offer = Offer::find($request -> offer_id);  // search in given table id only
        
      $offer = Offer::select('id', 'title_ar', 'title_en', 'details_ar', 'details_en', 'price')->find($request -> offer_id);

        return view('offersajax/editeajax', compact('offer'));       
    }
      public  function updateajax(Request $request){
     
        $offer = Offer::find($request -> offer_id);
        $offer -> update($request -> all() );
          return response()->json([
                'status' => true ,
                'msg' => 'your offer updated successfully',
            ]);
    } 

    public function deleteajax(Request $request){
     
     $offer = Offer::find($request -> id); 
     //Offer::where('id','$offer_id')->first();
        $offer->delete();   
           return response()->json([
                'status' => true ,
                'msg' => 'your offer deleted successfully',
                'id' => $request -> id
            ]);
    } 
       
	
}
