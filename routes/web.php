<?php
use App\User;
use App\Models\Offer;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\myauth\Customauth;
use App\Models\Phone;
use App\Http\Controllers\Relashions\hospdoc;
define('PAGINATION_COUNT',5);
  

Route::get('/', function () {
     return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/redirect/{service}', 'FaceController@redirect');
Route::get('/callback/{service}', 'FaceController@callback');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {

    Route::group(['prefix => offers'], function () {
        //   Route::get('store', 'Crud@store');
        Route::get('/create' , 'Crud@create');
        Route::post('/store' , 'Crud@store')->name('offers.store');
        Route::get('/select', 'Crud@select');
        Route::get('/edite/{offer_id}' ,  'Crud@edite');
        Route::post('/update/{offer_id}', 'Crud@update')->name('offers.update');
        Route::get('/delete/{offer_id}', 'Crud@delete')->name('delete');
        });
        Route::get('/video', 'Videos@getvideos')->name('video')->middleware('auth');
});
    
//***************start with ajax*********************************

Route::group(['prefix => offers-ajax'], function () {

   Route::get('/createajax','Offers@createajax');
   Route::post('/storeajax','Offers@storeajax')->name('storeajax');
   Route::get('/selectajax', 'Offers@selectajax');
   Route::get('/editeajax/{offer_id}','Offers@editeajax');
   Route::post('/updateajax','Offers@updateajax')->name('offersupdateajax');
   Route::post('/deleteajax', 'Offers@deleteajax')->name('deleteajax');
   
});    
//******************end ajax************************************ 
//******************start authenticate************************** 

Route::get('/adaults','myauth\Customauth@adault')->middleware('checkage');
Route::get('/site','myauth\Customauth@site')->middleware('auth:web')->name('site');
Route::get('/admin','myauth\Customauth@admin')->middleware('auth:admin')->name('admin');
Route::get('/adminlog','myauth\Customauth@adminlog')->name('adminlog');
Route::post('/admindata','myauth\Customauth@admindata')->name('adminlogdata');
 
// ******************end authenticate*************************

// *************start relashions code***********************

Route::get('phone','Relashions\userphone@getphone');
Route::get('user' ,'Relashions\userphone@getuser');
Route::get('userhasphone' ,'Relashions\userphone@getuserhasphone');
Route::get('hasMany' ,'Relashions\userphone@hasMany');
Route::get('hosp' ,'Relashions\hospdoc@hosp');
Route::get('hospitals' ,'Relashions\hospdoc@hospitals');
Route::get('doctors/{hospital_id}' ,'Relashions\hospdoc@doctors')->name('showdoc');
// *************************manyToManey************************
Route::get('services-doctors/{doctor_id}' ,'Relashions\hospdoc@services')->name('showservices');
// ************************manyToManey*************************

Route::get('hasdocsmale','Relashions\hospdoc@hasdocsmale');
Route::get('delhos/{dospital_id}' ,'Relashions\hospdoc@delhos')->name('delhos');





// *************end relashions code ********************









