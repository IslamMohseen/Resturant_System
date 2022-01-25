<?php

use Illuminate\Support\Facades\Route;


Route::get('/','HomeController@index');
Route::get('redirect','HomeController@redirect');

Route::post('/reservation','AdminController@reservation');

Route::post('/addcart/{id}','HomeController@addcart');
Route::get('/viewcart/{id}','HomeController@viewcart');
Route::get('/removecart/{id}','HomeController@removecart');
Route::post('/orderconfirm','HomeController@orderconfirm'); 


Route::middleware(['auth', 'admin'])->group(function () {
    
    Route::get('/users','AdminController@users');
    Route::get('/deleteuser/{id}','AdminController@deleteuser');
    
    Route::get('/foodmenu','AdminController@foodmenu');
    Route::post('/uploadfood','AdminController@upload');
    Route::get('/editfood/{id}','AdminController@editfood');
    Route::post('/updatefood/{id}','AdminController@updatefood');
    Route::get('/deletefood/{id}','AdminController@deletefood');
    
    Route::get('/viewchef','AdminController@viewchef');
    Route::post('/uploadchef','AdminController@uploadchef');
    Route::get('/editchef/{id}','AdminController@editchef');
    Route::get('/deletechef/{id}','AdminController@deletechef');

    Route::get('/viewreservation','AdminController@viewreservation');

    Route::get('/orders','AdminController@orders');
    Route::get('/search','AdminController@search');

});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
