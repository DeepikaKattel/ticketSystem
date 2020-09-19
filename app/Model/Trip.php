<?php

namespace App\Model;

use App\Model\Route;
use App\Model\VehicleType;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $table = 'trips';
    protected $fillable = ([
        'title','departure_date','vehicleType_id','route_id','price','status','available_seats'
    ]);
    protected $casts = [
        'allocated_seats' => 'array'
    ];

    public function route(){
        return $this->belongsTo(Route::class,'route_id');
    }
    public function vehicleType(){
        return $this->belongsTo(VehicleType::class, 'vehicleType_id');
    }
}
