<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User, Address};

class registerController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function store(Request $request){
        $data = $request->all();

        $data['user']['role'] = 'participante';
        $user = User::create($data['user']);

        $user->address()->create($data['address']);

        foreach ($data['phones'] as $phone){
            $user->phones()->create($phone);
        }
    }
}
