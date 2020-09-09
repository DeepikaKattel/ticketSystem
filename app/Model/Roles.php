<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table= 'roles';
    protected $fillable = [
        'name',
    ];
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
