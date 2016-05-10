<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
  public function items() {
      # Location has many Items
      # Define a one-to-many relationship.
      return $this->hasMany('\App\Item');
  }

  public static function locationsForDropdown(){
    //Get all locations
    $locations = \App\Location::orderBy('location_name', 'asc')->get();

    //Build Array for Location dropdown
    $locations_for_dropdown = [];
    foreach($locations as $location){
      $locations_for_dropdown[$location->id] = $location->location_name;
    }
    return $locations_for_dropdown;
  }


}
