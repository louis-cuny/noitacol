<?php

namespace App\Model;

use utils\classes\Model;

class Intermediate extends Model
{
    protected $table = 'intermediate';

    public function reservations()
    {
        return $this->hasMany('App\Model\Reservation', 'intermediate_id', 'id');
    }
}
