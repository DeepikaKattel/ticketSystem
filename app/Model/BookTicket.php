<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BookTicket extends Model
{
    protected $table = 'book_tickets';
    protected $fillable = ([
        'date','vehicleType','route','seat','passengers','children','special','price','email','pickup','drop','status'
    ]);
}
