<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class registerController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function store(RegisterRequest $request){
        $data = $request->validated();

        $data['user']['role'] = 'participant';

        DB::beginTransaction();
        try{
            $user = User::create($data['user']);

            $user->address()->create($data['address']); 

            foreach ($data['phones'] as $phone){
                $user->phones()->create($phone);
            }

            DB::commit();

            return redirect()->route('auth.login.create')->with('success', 'Conta criada com sucesso! Efetue o login');
        } catch(\Exception $exception){
            DB::rollBack();
            return 'Mesangem: '.$exception->getMessage();
        }
    }
}
