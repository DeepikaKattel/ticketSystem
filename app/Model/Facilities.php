<?php

namespace App\Model;

use App\VehicleType;
use Illuminate\Database\Eloquent\Model;

class Facilities extends Model
{
    protected $table = 'facilities';
    protected $fillable = ([
        'name','services',
    ]);

    public function vehicleType()
    {
        return $this->hasMany(VehicleType::class);
    }
}
