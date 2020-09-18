<?php

namespace App\Model;
use App\Model\VehicleType;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table = 'vehicles';
    protected $fillable = ([
        'reg_number','vehicleType_id','engine','chassis','model','owner_name','owner_number','brand_name','status'
    ]);

    public function vehicleType(){
        return $this->belongsTo(VehicleType::class,'vehicleType_id');
    }
}
