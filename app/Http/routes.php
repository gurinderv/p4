<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => 'auth'], function(){
    //Routes for Item/Inventory Actions
    Route::get('/items', 'ItemController@getItems');
    Route::post('/item/add', 'ItemController@addItem');
    Route::get('/item/edit/{id?}', 'ItemController@getEditItem');
    Route::post('/item/edit', 'ItemController@postEditItem');

    Route::post('/item/remove/{id?}', function(){
        return 'remove an item';
    });

    //Routes for Location Actions
    Route::get('/locations', 'LocationController@getLocations');
    Route::post('/location/add', 'LocationController@addLocation');
    Route::get('/location/edit/{id?}', 'LocationController@getEditLocation');
    Route::post('/location/edit', 'LocationController@postEditLocation');

    Route::post('/location/remove/{location}', function(){
        return 'remove a location';
    });
});

//Routes for authentication
Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');

Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');

Route::get('/logout', 'Auth\AuthController@logout');

Route::get('/show-login-status', function() {

    # You may access the authenticated user via the Auth facade
    $user = Auth::user();

    if($user) {
        echo 'You are logged in.';
        dump($user->toArray());
    } else {
        echo 'You are not logged in.';
    }

    return;

});
