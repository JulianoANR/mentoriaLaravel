<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\{
    User,
    Address
};
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function store(RegisterRequest $request){
        $requestdata = $request->validated();
        $requestdata['user']['role'] = 'participant';

        DB::beginTransaction();

        try{

            $user = User::create($requestdata['user']);
            $user->address()->create($requestdata['address']);

            foreach ($requestdata['phones'] as $phone) {
                $user->phone()->create($phone);
            }

            DB::commit();

            return redirect()->route('auth.login.create')->with('success','Conta criada com sucesso!');
        }catch(\Exception $exception){
            DB::rollBack();
            return 'Mensagem: ' . $exception->getMessage();
        }
    }
}
