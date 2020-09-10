<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    protected $table = 'vehicle_type';
    protected $fillable = ([
        'name','layout', 'seat','facility_id','status'
    ]);
}
