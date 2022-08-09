<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
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

    //mutators
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
