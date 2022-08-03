<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    // GET INDEX
        public function index(){
            $users = User::all();

            return view('users.index', ['users'=>$users]);
        }

    // GET CREATE
        public function create(){
            return view('users.create');
        }

    // POST
        public function store(Request $request)
        {
            /* METODO 1(caso haja especificação)
                User::create([
                    'name' => $data['name'],
                    'email' => $data['email']
                ]);
            */

            // METODO 2 (caso queira enviar tudo)
                User::create($request->all());
            
            return redirect()->route('users.index');
        }
}
