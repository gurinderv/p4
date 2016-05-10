<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LocationController extends Controller
{
  public function getLocations(){
    $locations = \App\Location::orderBy('location_name', 'desc')->get();
    return view('location.index')->with('locations', $locations);
  }

  public function addLocation(Request $request){
    $this->validate($request, [
      'newLocation' => 'required|max:20',
    ]);

    #Add the new location
    $location = new \App\Location();
    $location->location_name = $request->newLocation;
    $location->save();

    \Session::flash('message', 'Your location was added.');
    return redirect('/locations');
  }

  public function getEditLocation($id) {
    $location = \App\Location::find($id);
    return view('location.edit')->with('location', $location);
  }

  public function postEditLocation(Request $request){
    $location = \App\Location::find($request->id);
    $location->location_name = $request->location_name;
    $location->save();

    \Session::flash('message', 'Your location has been updated.');
    return redirect('/location/edit/'.$request->id);
  }




    

    public function getModelRead(){
      $locations = \App\Location::all();

      # Make sure we have results before trying to print them...
      if(!$locations->isEmpty()) {

          // Output the books
          foreach($locations as $location) {
              echo $location->location_name.'<br>';
          }
      }
      else {
          echo 'No books found';
      }
    }

    public function getModelCreate(){
      # Instantiate a new Book Model object
      $location = new \App\Location();

      # Set the parameters
      # Note how each parameter corresponds to a field in the table
      $location->location_name = 'Under Kitchen Sink';

      # Invoke the Eloquent save() method
      # This will generate a new row in the `books` table, with the above data
      $location->save();

      echo 'Added: '.$location->location_name;
    }






}
