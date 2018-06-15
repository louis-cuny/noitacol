<?php

namespace App\Model;

use utils\classes\Model;

class Reservation extends Model
{
    protected $table = 'reservation';

    protected $dates = [
        'start',
        'end',
        'collection',
        'created_at',
        'updated_at'
    ];

    public function traveller()
    {
        return $this->belongsTo('Traveller', 'id', 'traveller_id');
    }

    public function location()
    {
        return $this->belongsTo('Location', 'id', 'location_id');
    }

    public function intermediate()
    {
        return $this->belongsTo('Intermediate', 'id', 'intermediate_id');
    }
}
