<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return response('The Api is working okay');
});


Route::group(['prefix' => "auth"], function () {
    Route::post('login', 'UserController@login');
    Route::post('register', 'UserController@register'); 
});



Route::group(['middleware' => 'auth:api'], function(){

Route::get('details', 'UserController@details');
Route::get('logout', 'UserController@logout');



//receipient
Route::get('receipient','ReceipientController@getAllReceipients');
Route::put('receipient/{id}','ReceipientController@receipientUpdate');
Route::get('receipient/{id}','ReceipientController@receipientById');
Route::post('receipient','ReceipientController@receipientCreate');
Route::delete('receipient','ReceipientController@receipientDelete');


//message
Route::get('message','MessageController@getAllMessages');
Route::put('message/{id}','MessageController@messageUpdate');
Route::get('message/{id}','MessageController@messageById');
Route::post('message','MessageController@messageCreate');
Route::delete('message','MessageController@messageDelete');

//masterprice
Route::get('masterprice','MasterPriceController@getAllMasterprices');
Route::put('masterprice/{id}','MasterPriceController@masterpriceUpdate');
Route::get('masterprice/{id}','MasterPriceController@masterpriceById');
Route::post('masterprice','MasterPriceController@masterpriceCreate');
Route::delete('masterprice','MasterPriceController@masterpriceDelete');

});

Route::group(['prefix' => "master"], function () {

//user
Route::get('useraccount','UserController@getAllUsers');
Route::put('useraccount/{userid}','UserController@userUpdate');
Route::get('useraccount/{userid}','UserController@userById');
Route::post('useraccount','UserController@userCreate');
Route::delete('useraccount','UserController@userDelete');


//institution
Route::get('institution','InstitutionController@getAllInstitutions');
Route::put('institution/{institutionid}','InstitutionController@institutionUpdate');
Route::get('institution/{institutionid}','InstitutionController@institutionById');
Route::post('institution','InstitutionController@institutionCreate');
Route::delete('institution','InstitutionController@institutionDelete');

//task
Route::get('task','TaskController@getAllTasks');
Route::put('task/{id}','TaskController@taskUpdate');
Route::get('task/{id}','TaskController@taskById');
Route::post('task','TaskController@taskCreate');
Route::delete('task','TaskController@taskDelete');

//price
Route::get('price','PriceController@getAllPrices');
Route::put('price/{id}','PriceController@priceUpdate');
Route::get('price/{id}','PriceController@priceById');
Route::post('price','PriceController@priceCreate');
Route::delete('price','PriceController@priceDelete');

});