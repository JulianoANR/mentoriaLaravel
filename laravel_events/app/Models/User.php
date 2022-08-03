<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable=['name', 'email', 'cpf', 'password', 'role'];
    
    //hidden - impede que o atributo apareça em uma consulta
        protected $hidden = ['password'];
    
    //mutators
        public function setPasswordAttribute($value){
            $this->attributes['password'] = bcrypt($value); //CRIPTOGRAFA A SENHA
        }

    //relationships
        public function address(){
            return $this->hasOne(Address::class);
        }

        public function phones(){
            return $this->hasMany(Phone::class);
        }
}
