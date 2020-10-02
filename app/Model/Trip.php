<?php

namespace App\Model;

use App\Model\Route;
use App\Model\VehicleType;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $table = 'trips';
    protected $fillable = ([
        'title','departure_date','vehicle_id','route_id','price','status','available_seats', 'time'
    ]);
    protected $casts = [
        'allocated_seats' => 'array'
    ];

    public function route(){
        return $this->belongsTo(Route::class,'route_id');
    }
    public function vehicle(){
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }
}
