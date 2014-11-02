<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	//$timers = Timer::orderBy('startdate', 'DESC')->paginate(3);

	return View::make('site.index');
});

Route::get('register', 'AuthController@getRegister');
Route::post('register', 'AuthController@postRegister');
Route::get('login', 'AuthController@getLogin');
Route::post('login', 'AuthController@postLogin');
Route::post('search', 'HomeController@search');

Route::group(array('before' => 'auth'), function(){
	Route::get('admin', 'AdminController@index');
	Route::get('logout', 'AuthController@logout');
	Route::post('timers.start','TimerController@start');
	Route::post('timers.stop','TimerController@stop');
	Route::resource('timers', 'TimerController');
});