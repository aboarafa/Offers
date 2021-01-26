<?php

namespace App\Http\Controllers;

use App\Traits\OfferTrait;
use App\Http\Requests\offerRequest;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use LaravelLocalization;

class Crud extends Controller
{     
      use OfferTrait;
    public function create()
    {
      	return view('offers.create');
    }
    public function store(offerRequest $request)
    {           
       	// $validator = Validator::make($request->all(),$validat,$messages);
        // if($validator -> fails()){
        // 	return redirect()->back()->withErrors($validator)->withInputs($request->all());
        // }
       $imgname = $this->saveImage($request -> img ,'images/offers');

        Offer::create([
                     
                    'title_ar'  => $request -> title_ar ,   
                    'title_en'  => $request -> title_en ,   
                    'details_ar'=> $request -> details_ar ,   
                    'details_en'=> $request -> details_en ,      
                    'price'     => $request -> price ,   
                    'img'       => $imgname ,   
        ]);
        return redirect()->back()->with(['success' => 'your offer add success']);        
       
    }
    public function select()
    {
     $selectall =  Offer::select('id','price','img','title_'. LaravelLocalization::getCurrentLocale(). ' as title','details_'.LaravelLocalization::getCurrentLocale(). ' as details')->paginate(PAGINATION_COUNT);
      return view('offers.showoffers',compact('selectall'));
     
    }
    public function edite($offer_id)
    { 
        $offer = Offer::find($offer_id);  // search in given table id only
        if (!$offer)
            return redirect()->back();

        $offer = Offer::select('id', 'title_ar', 'title_en', 'details_ar', 'details_en', 'price','img')->find($offer_id);

        return view('offers.edite', compact('offer'));       
    }
    public function update(OfferRequest $request, $offer_id)
    { 
      $offer = Offer::find($offer_id);

        $imgext  = $request -> img -> getClientOriginalExtension();
        $imgname = time().'.'.$imgext;
        $path    = 'images/offers';
        $request -> img -> move($path,$imgname);

      // $offer->update($request->all());
        offer::where('id',$offer_id)->update([

                    'title_ar'  => $request -> title_ar ,   
                    'title_en'  => $request -> title_en ,   
                    'details_ar'=> $request -> details_ar ,   
                    'details_en'=> $request -> details_en ,      
                    'price'     => $request -> price ,   
                    'img'       => $imgname ,   
        ]);     
     
          return redirect()->back()->with(['success' => 'your offer updated success']);
    } 
    public function delete($offer_id)
    {
        $offer = Offer::find($offer_id); 
         //Offer::where('id','$offer_id')->first();
        $offer->delete();        
        return redirect()->back()->with(['success' => __('messages.your offer delete success')]);
    }


}
	