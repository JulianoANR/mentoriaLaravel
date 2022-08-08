<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\loginRequest;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function create(){
        return view('auth.login');
    }

    public function store(loginRequest $request){
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($credentials)){
            return redirect()->route('participant.dashboard.index');
        }

        return  redirect()->route('auth.login.create')->with('warning', 'Autenticação falhou')->withInput();
    }

    public function destroy(){
        Auth::logout();
        return redirect()->route('auth.login.create');
    }
}
