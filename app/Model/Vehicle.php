<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table = 'vehicles';
    protected $fillable = ([
        'name','reg_number','vehicleType','engine','chassis','model','owner_name','owner_number','brand_name','status'
    ]);
}
