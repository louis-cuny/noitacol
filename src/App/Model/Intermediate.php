<?php

namespace App\Model;

use utils\classes\Model;

class Intermediate extends Model
{
    protected $table = 'intermediate';

    public function reservations()
    {
        return $this->hasMany('Reservation', 'id', 'intermediate_id');
    }
}
