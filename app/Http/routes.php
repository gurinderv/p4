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

Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(config('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    /*
    The following line will output your MySQL credentials.
    Uncomment it only if you're having a hard time connecting to the database and you
    need to confirm your credentials.
    When you're done debugging, comment it back out so you don't accidentally leave it
    running on your live server, making your credentials public.
    */
    //print_r(config('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    }
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

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
