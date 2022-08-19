<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    

    public function create()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        $requestData = $request->validated();

        $request['user']['role']= 'participant';
        
        DB::beginTransaction();
        try{
        
        $user = User::create($requestData['user']);
        
        $user->adress()->create($requestData['address']);

        foreach($requestData['phones'] as $phone){
            $user->phones()->create($phone);
        }
        DB::commit();
        return redirect()
            ->route('auth.login.create')
            ->with('success', 'Conta criada com sucesso! Efetue o login');
    }
    catch(\Exception $exception){
        DB::rollBack();
        return 'Mensagem: '.$exception->getMessage();
    }
    }
}
