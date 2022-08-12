<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    

    public function create()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        $requestData = $request->all();

        $request['user']['role']= 'participant';
        $user = User::create($requestData['user']);
        
        $user->adress()->create($requestData['address']);

        foreach($requestData['phones'] as $phone){
            $user->phones()->create($phone);
        }

    }
}
