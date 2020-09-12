<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $table = 'prices';
    protected $fillable = ([
        'route','vehicleType','price','children_price','special_price'
    ]);
}
