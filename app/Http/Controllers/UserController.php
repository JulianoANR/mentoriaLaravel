<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $user = User::all();

        return view('user.index', [
            'user' => $user
        ]);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $requestData = $request->all();

        /* Metodo 1
        $user = new User();
        $user->name = $requestData['name'];
        $user->email = $requestData['email'];
        $user->save(); */

        /* Metodo2
        User::created([
            'name' => $requestData['name'],
            'email' => $requestData['email']
        ]); */

        User::create($requestData);
    }
}
