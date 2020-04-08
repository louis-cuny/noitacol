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
        return $this->belongsTo('App\Model\Traveller', 'traveller_id', 'id' );
    }

    public function location()
    {
        return $this->belongsTo('App\Model\Location', 'location_id', 'id');
    }

    public function intermediate()
    {
        return $this->belongsTo('App\Model\Intermediate', 'intermediate_id', 'id');
    }
}
