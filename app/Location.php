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
}
