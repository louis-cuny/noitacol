<?php


namespace utils\classes;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    protected $guarded = 'id';

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
