<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/




/*
|--------------------------------------------------------------------------
|AUTH Routes
|--------------------------------------------------------------------------
*/
// Route::get('/api/login', 'ExampleController@index');
Route::post('login', 'AdminController@postLoginAdmin');
Route::post('register', 'AdminController@postCreateAdmin');



Route::get('halls', 'HallController@getAllHalls');
Route::post('hall/create', 'HallController@postCreateHall');
Route::get('hall/{id}', 'HallController@getHall');
Route::post('hall/{id}/book', 'BookingController@postCreateBooking');

Route::get('booking/{id}', 'BookingController@getBooking');