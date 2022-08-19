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

    //Não retornara o campo password
    protected $hidden = [
        'password'
    ];

    //relationships
    public function address(){
        return $this->hasOne(Address::class);
    }

    public function phones(){
        return $this->hasMany(Phone::class);
    }

     //Relationships
     public function events(){
        return $this->belongsToMany(Events::class);
    }

    //mutators
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
