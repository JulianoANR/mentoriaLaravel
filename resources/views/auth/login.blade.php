@extends('layouts.app')


@section('titleComplement', '- Login')
@section('content')
    <h1 class="text-center my-4">Login</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow my-4 mx-auto">
                    
                    @if (session()->has('warning'))
                    <div class="alert alert-warning">
                            {{ session('warning') }}
                        </div>
                    @endif
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="card-body">
                        <form action="{{route('auth.login.store')}}" method="POST" autocomplete="off">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="email" name="email"
                                            class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                            placeholder="E-mail"
                                            value="{{old('email')}}"
                                            >
                                        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="password" name="password"
                                            class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                            placeholder="Senha">
                                        <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-block mt-3">
                                Login
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="{{ route('auth.register.create') }}">Não tem uma conta? Cadastre-se!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
