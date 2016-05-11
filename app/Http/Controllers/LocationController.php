<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LocationController extends Controller
{
  public function getLocations(){


    $locations = \App\Location::where('user_id','=',\Auth::id())->orderBy('location_name', 'desc')->get();
    return view('location.index')->with('locations', $locations);
  }

  public function addLocation(Request $request){
    $this->validate($request, [
    'newLocation' => 'required|max:20',
    ]);

    #Add the new location
    $location = new \App\Location();
    $location->location_name = $request->newLocation;
    $location->user_id = \Auth::id();
    $location->save();

    \Session::flash('message', 'Your location was added.');
    return redirect('/locations');
  }

  public function getEditLocation($id) {
    $location = \App\Location::find($id);
    return view('location.edit')->with('location', $location);
  }

  public function postEditLocation(Request $request){
    $this->validate($request, [
    'location_name' => 'required|max:20',
    ]);

    $location = \App\Location::find($request->id);
    $location->location_name = $request->location_name;
    $location->user_id = \Auth::id();
    $location->save();

    \Session::flash('message', 'Your location has been updated.');
    return redirect('/locations');
  }
}
