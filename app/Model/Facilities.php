<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Facilities extends Model
{
    protected $table = 'facilities';
    protected $fillable = ([
        'name','services',
    ]);
}
