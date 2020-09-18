<?php

namespace App\Model;

use App\Model\Vehicle;
use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    protected $table = 'vehicle_type';
    protected $fillable = ([
        'name','layout', 'row','column','facility_id','status'
    ]);




}
