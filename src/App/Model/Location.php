<?php

namespace App\Model;

use utils\classes\Model;

class Location extends Model
{
    protected $table = 'location';

    public function user()
    {
        return $this->belongsTo('User', 'id', 'location_id');
    }

    public function reservations()
    {
        return $this->hasMany('Reservation', 'reservation_id', 'id');
    }
}
