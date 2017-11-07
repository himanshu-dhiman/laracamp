<?php

use app\Event;



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

Route::get('/', function () {
	$event = Event::latest('date')->first();
    return view('welcome')->with('event', $event);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/events', 'EventController');
Route::resource('/guests', 'GuestController');
Route::get('/events/{event}/invite/{guest}', 'EventController@invite');
Route::get('/rsvp/api_token={token}', 'RsvpController@rsvp');
Route::post('/rsvp/response', 'RsvpController@response');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
