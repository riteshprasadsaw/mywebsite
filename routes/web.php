<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//use Log;

Route::get('/',function(){

	$plans=App\Plan::all();

	return view('welcome', compact('plans'));


});

//Route::get('/','UsersController@index');

//Route::get('/{name}','UsersController@show');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::post('/subscriptions', 'SubscriptionsController@store');

Route::delete('/subscriptions', 'SubscriptionsController@destroy');

Route::patch('/subscriptions', 'SubscriptionsController@update');

Route::post('stripe/webhook', 'WebhooksController@handle');



