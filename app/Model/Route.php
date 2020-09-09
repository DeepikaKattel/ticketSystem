<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $table = 'routes';
    protected $fillable = ([
        'staff_id', 'firstDestination', 'lastDestination', 'totalDuration', 'departure', 'arrival'
    ]);
}
