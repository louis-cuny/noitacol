<?php

namespace App\Model;

use utils\classes\Model;

class Traveller extends Model
{
    protected $table = 'traveller';

    public function reservations()
    {
        return $this->belongsToMany('Reservation', 'id', 'traveller_id');
    }
}
