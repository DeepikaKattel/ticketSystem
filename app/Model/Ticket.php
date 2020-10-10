<?php

namespace App\Model;

use App\User;
use App\Model\Trip;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public $timestamps = false;
    protected $casts = [
        'allocated_seats' => 'array',
    ];
    protected $fillable = ([
        'name[]','phoneNumber[]'
    ]);

    public function trip(){
    	return $this->belongsTo(Trip::class);
    }
    public function user(){
    	return $this->belongsTo(User::class);
    }
}
