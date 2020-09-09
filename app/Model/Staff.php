<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staff';
    protected $fillable = ([
        'name','position', 'phoneNumber','address'
    ]);

    public function routes()
    {
        return $this->hasMany(Route::class);
    }
}
