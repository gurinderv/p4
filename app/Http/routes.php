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


Route::group(['middleware' => ['web']], function () {

Route::get('/byitem', function(){
    return view('byitem.index');
});

Route::post('/add/{itemID, location}', function(){
    return 'add item to a location';
});

Route::post('/update/{itemID, location}', function(){
    return "change an item's location";
});

Route::post('/remove/{itemID, location}', function(){
    return 'remove an item from a location';
});

Route::get('/inventory', function(){
    //return 'show list of inventory items';
    return view('inventory.index');
});

Route::post('/inventory/add', function(){
    return 'add an item';
});

Route::get('/inventory/edit/{itemID}', function(){
    return 'select an item to edit';
});

Route::post('/inventory/edit/{itemID}', function(){
    return 'submit an edited item';
});

Route::post('/inventory/remove/{itemID}', function(){
    return 'remove an item';
});

Route::get('/locations', function(){
    //return 'show list of locations';
    return view('location.index');
});

Route::post('/locations/add', function(){
    return 'add a location';
});

Route::get('/locations/edit/{location}', function(){
    return 'select a location to edit';
});

Route::post('/locations/edit/{location}', function(){
    return 'submit an edited location';
});

Route::post('/locations/remove/{location}', function(){
    return 'remove a location';
});

});
