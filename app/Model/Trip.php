<?php

namespace App\Model;

use App\Model\Route;
use App\Model\Vehicle;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $table = 'trips';
    protected $fillable = ([
        'title','vehicleType_id','route_id','status','available_seats','allocated_seats' => 'array'
    ]);

    public function route(){
        return $this->belongsTo(Route::class);
    }
    public function vehicle(){
        return $this->belongsTo(Vehicle::class);
    }
}
