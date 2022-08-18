<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sb-admin-2.min.css') }}">
    <title>Document</title>
</head>

<body>
    <h1 class="text-center my-4">Criar conta</h1>

    <div class="card shadow my-5 w-75 mx-auto">
        <div class="card-body">
            <form action="{{ route('auth.register.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <input type="text" class="form-control {{ $errors->has('user.name') ? 'is-invalid' : '' }}" placeholder="Nome" name="user[name]" value="{{ old('user.name')}}">
                        </div>
                        <div>{{ $errors->first('user.name') }}</div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="E-mail" name="user[email]" value="{{ old('user.email')}}">
                        </div>
                        <div>{{ $errors->first('user.email') }}</div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control cpf" placeholder="CPF" name="user[cpf]" value="{{ old('user.cpf')}}">
                        </div>
                        <div>{{ $errors->first('user.cpf') }}</div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Senha" name="user[password]">
                        </div>
                        <div>{{ $errors->first('user.password') }}</div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Confirmar Senha" name="user[password_confirmation]">
                        </div>
                    </div>
                </div>

                <br>

                <div class="row mt-4">
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" name="address[cep]" id="cep" class="form-control cep" placeholder="CEP" value="{{ old('address.cep')}}">
                        </div>
                        <div>{{ $errors->first('address.cep') }}</div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="text" name="address[uf]" id="uf" class="form-control uf" placeholder="UF" value="{{ old('address.uf')}}">
                        </div>
                        <div>{{ $errors->first('address.uf') }}</div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <input type="text" name="address[city]" id="city" class="form-control" placeholder="Cidade" value="{{ old('address.city')}}">
                        </div>
                        <div>{{ $errors->first('address.city') }}</div>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            <input type="text" name="address[street]" id="street" class="form-control" placeholder="Logradouro" value="{{ old('address.street')}}">
                        </div>
                        <div>{{ $errors->first('address.street') }}</div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" name="address[number]" class="form-control" placeholder="Número" value="{{ old('address.number')}}">
                        </div>
                        <div>{{ $errors->first('address.number') }}</div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="address[district]" id="district" class="form-control" placeholder="Bairro" value="{{ old('address.district')}}">
                        </div>
                        <div>{{ $errors->first('address.district') }}</div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="address[complement]" class="form-control" placeholder="Complemento" value="{{ old('address.complement')}}">
                        </div>
                        <div>{{ $errors->first('address.complement') }}</div>
                    </div>
                </div>

                <br>


                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="phones[0][number]" class="form-control phone" placeholder="Telefone" value="{{ old('phone.0.number')}}">
                        </div>
                        <div>{{ $errors->first('phones.0.number') }}</div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="phones[1][number]" class="form-control cellphone" placeholder="Celular" value="{{ old('phone.1.number')}}">
                        </div>
                        <div>{{ $errors->first('phones.1.number') }}</div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success btn-block mt-3"> Criar Conta </button>
            </form>
        </div>
    </div>

    <script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('vendor/jquery-mask/jquery.mask.min.js')}}"></script>
    <script src="{{ asset('js/auth/register.js') }}"></script>
</body>
</html>
