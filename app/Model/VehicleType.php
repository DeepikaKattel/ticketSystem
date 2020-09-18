<?php

namespace App\Model;

use App\Model\Vehicle;
use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    protected $table = 'vehicle_type';
    protected $fillable = ([
        'name','layout', 'Seat_Row','Seat_Column','facility_id','status'
    ]);

    public function vehicle(){
        return $this->hasMany(Vehicle::class);
    }
}
