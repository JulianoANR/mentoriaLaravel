<?php

namespace App\Http\Requests\auth;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\cpf;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user.name' => 'required',
            'user.email' => ['required', 'email', 'unique:users,email'],
            'user.cpf' => ['required', new cpf, 'unique:users,cpf'],
            'user.password' => ['required', 'min:8', 'confirmed'],
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

    public function attributes()
    {
        return [
            'user.name' => 'nome',
            'user.email' => 'email',
            'user.cpf' => 'cpf',
            'user.password' => 'senha',
            'phones.0.number' => 'telefone',
            'phones.1.number' => 'celular',
            'address.cep' => 'CEP',
            'address.street' => 'logradouro',
            'address.number' => 'número',
            'address.uf' => 'UF',
            'address.city' => 'cidade',
            'address.district' => 'bairro',
            'address.complement' => 'complemento'
        ];
    }
}
