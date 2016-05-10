<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function location() {
        # Item belongs to Location
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('\App\Location');
    }

    public function user(){
        return $this->belongsTo('\App\User');
    }
}
