<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\{User, Address};
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class registerController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function store(RegisterRequest $request){
        $data = $request->validated();

        $data['user']['role'] = 'participante';

        DB::beginTransaction();
        try{
            $user = User::create($data['user']);

            $user->address()->create($data['address']); 

            foreach ($data['phones'] as $phone){
                $user->phones()->create($phone);
            }

            DB::commit();

            // return 'Conta criada com sucesso';
        } catch(\Exception $exception){
            DB::rollBack();
            return 'Mesangem: '.$exception->getMessage();
        }
    }
}
