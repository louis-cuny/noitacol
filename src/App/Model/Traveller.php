<?php

namespace App\Model;

use utils\classes\Model;

class Traveller extends Model
{
    protected $table = 'traveller';

    public function reservations()
    {
        return $this->belongsToMany('App\Model\Reservation', 'traveller_id', 'id');
    }
}
