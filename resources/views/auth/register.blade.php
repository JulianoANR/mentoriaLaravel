@extends('layouts.app')

@section('content')
    
<h1 class="text-center my-4">Criar conta</h1>

<div class="card shadow my-5 w-75 mx-auto">
    <div class="card-body">
        <form method="POST" action="{{ route('auth.register.store') }}">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <input
                            name="user[name]"
                            type="text"
                            class="form-control  {{ $errors->has('user.name') ? 'is invalid' : ''}}"
                            placeholder="Nome"
                        >
                        <div class="invalid-feedback">
                            {{ $errors->first('user.name') }}
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group"> 
                        <input
                            name="user[email]"
                            type="email"
                            class="form-control {{ $errors->has('user.email') ? 'is invalid' : ''}}"
                            placeholder="E-mail"
                        >
                        <div class="invalid-feedback">
                            {{ $errors->first('user.email') }}
                        </div>
                    </div>
                </div>

                <div class="col-md-6">  
                    <div class="form-group">     
                        <input
                            name="user[cpf]"
                            type="text"
                            class="form-control {{ $errors->has('user.cpf') ? 'is invalid' : ''}}"
                            placeholder="CPF"
                        >
                        <div class="invalid-feedback">
                            {{ $errors->first('user.cpf') }}
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">  
                    <div class="form-group">     
                        <input
                            name="user[password]"
                            type="password"
                            class="form-control  {{ $errors->has('user.password') ? 'is invalid' : ''}}"
                            placeholder="Senha"
                        >
                        <div class="invalid-feedback">
                            {{ $errors->first('user.password') }}
                        </div>
                    </div>
                </div>

            </div>

            <hr>

            <div class="row mt-4">
                <div class="col-md-3">
                    <div class="form-group">
                        <input
                            type="text"
                            name="address[cep]"
                            class="form-control {{ $errors->has('address.cep') ? 'is invalid' : ''}}"
                            placeholder="CEP"
                        >
                        <div class="invalid-feedback">
                            {{ $errors->first('address.cep') }}
                        </div>
                    </div>
                </div>
                
                <div class="col-md-2">
                    <div class="form-group">
                        <input
                            type="text"
                            name="address[uf]"
                            class="form-control {{ $errors->has('address.uf') ? 'is invalid' : ''}}"
                            placeholder="UF"
                        >
                        <div class="invalid-feedback">
                            {{ $errors->first('address.uf') }}
                        </div>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="form-group">
                        <input
                            type="text"
                            name="address[city]"
                            class="form-control {{ $errors->has('address.city') ? 'is invalid' : ''}}"
                            placeholder="Cidade"
                        >
                        <div class="invalid-feedback">
                            {{ $errors->first('address.city') }}
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="form-group">
                        <input
                            type="text"
                            name="address[street]"
                            class="form-control {{ $errors->has('address.street') ? 'is invalid' : ''}}"
                            placeholder="Logradouro"
                        >
                        <div class="invalid-feedback">
                            {{ $errors->first('address.street') }}
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <input
                            type="text"
                            name="address[number]"
                            class="form-control {{ $errors->has('address.number') ? 'is invalid' : ''}}"
                            placeholder="Número"
                        >
                        <div class="invalid-feedback">
                            {{ $errors->first('address.number') }}
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <input
                            type="text"
                            name="address[district]"
                            class="form-control  {{ $errors->has('address.district') ? 'is invalid' : ''}}"
                            placeholder="Bairro"
                        >
                        <div class="invalid-feedback">
                            {{ $errors->first('address.district') }}
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <input
                            type="text"
                            name="address[complement]"
                            class="form-control {{ $errors->has('address.complement') ? 'is invalid' : ''}}"
                            placeholder="Complemento"
                        >
                        <div class="invalid-feedback">
                            {{ $errors->first('address.complement') }}
                        </div>
                    </div>
                </div>

            </div>
            
            <hr>
            
            <div class="row mt-4">
                <div class="col-md-6">  
                    <div class="form-group">     
                        <input
                            type="text"
                            name="phones[0][number]"
                            class="form-control {{ $errors->has('phone.0.number') ? 'is invalid' : ''}}"
                            placeholder="Telefone"
                        >
                        <div class="invalid-feedback">
                            {{ $errors->first('phone.0.number') }}
                        </div>
                    </div>
                </div>

                <div class="col-md-6">  
                    <div class="form-group">     
                        <input
                            type="text"
                            name="phones[1][number]"
                            class="form-control {{ $errors->has('phone.1.number') ? 'is invalid' : ''}}"
                            placeholder="Celular"
                        >
                        <div class="invalid-feedback">
                            {{ $errors->first('phone.1.number') }}
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-success btn-block mt-3">
                Criar usuário
            </button>
        </form>
    </div>
</div>



@endsection