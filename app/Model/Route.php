<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $table = 'routes';
    protected $fillable = ([
        'name', 'start_point', 'end_point', 'stoppage_points', 'distance', 'child_seat','special_seat', 'status'
    ]);
}
