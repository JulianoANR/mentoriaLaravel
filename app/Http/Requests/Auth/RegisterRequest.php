<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'user.name' => 'required',
            'user.email' => ['required', 'email'],
            'user.cpf' => 'required',
            'user.password' => ['required', 'min:8'],
            'phones.0.number' => ['required', 'size:14'],
            'phones.1.number' => ['required', 'size:15'],
            'address.cep' => 'required',
            'address.uf' => ['required', 'size:2'],
            'address.city' => 'required',
            'address.street' => 'required',
            'address.number' => ['required', 'numeric', 'integer'],
            'address.district' => 'required',
            'address.complement' => ['', 'max:25']
        ];
    }
}
