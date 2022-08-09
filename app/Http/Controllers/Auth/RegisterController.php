<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\{User, Address};
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {

        $requestData = $request->all();

        // return $requestData;

        $requestData['user']['role'] = 'participant';


        $user = User::create($requestData['user']);

        $requestData['address']['user_id'] = $user->id;

        Address::create($requestData['address']);

    }
}
