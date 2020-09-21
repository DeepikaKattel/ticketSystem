<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $table = 'routes';
    protected $fillable = ([
        'start_point', 'end_point', 'name', 'stoppage_points', 'distance', 'child_seat','special_seat', 'status'
    ]);
}
