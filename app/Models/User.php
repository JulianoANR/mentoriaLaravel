<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'cpf',
        'password',
        'role'
    ];

    protected $hidden = [
        'password'
    ];

    //relationships
    public function adress()
    {
        return $this->hasOne(Address::class);
    }

    public function events()
    {
        return $this->belongsToMany(Event::class);
    }

    public function phones()
    {
        return $this->hasMany(Phone::class);
    }

    //mutator
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
