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
                            <input name="user[name]" type="text"
                                class="form-control  {{ $errors->has('user.name') ? 'is-invalid' : '' }}" placeholder="Nome"
                                value="{{ old('user.name') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('user.name') }}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <input name="user[email]" type="email"
                                class="form-control {{ $errors->has('user.email') ? 'is-invalid' : '' }}"
                                placeholder="E-mail" value="{{ old('user.email') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('user.email') }}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <input name="user[cpf]" type="text"
                                class="form-control cpf {{ $errors->has('user.cpf') ? 'is-invalid' : '' }}"
                                placeholder="CPF" value="{{ old('user.cpf') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('user.cpf') }}
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <input name="user[password]" type="password"
                                class="form-control  {{ $errors->has('user.password') ? 'is-invalid' : '' }}"
                                placeholder="Senha">
                            <div class="invalid-feedback">
                                {{ $errors->first('user.password') }}
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <input name="user[password_confirmation]" type="password"
                                class="form-control  {{ $errors->has('user.password') ? 'is-invalid' : '' }}"
                                placeholder="Confirmar senha">
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
                            <input type="text" name="address[cep]"
                                class="form-control cep {{ $errors->has('address.cep') ? 'is-invalid' : '' }}"
                                placeholder="CEP" id="cep" value="{{ old('address.cep') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('address.cep') }}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="text" name="address[uf]" id="uf"
                                class="form-control uf {{ $errors->has('address.uf') ? 'is-invalid' : '' }}"
                                placeholder="UF" value="{{ old('address.uf') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('address.uf') }}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="form-group">
                            <input type="text" name="address[city]" id="city"
                                class="form-control {{ $errors->has('address.city') ? 'is-invalid' : '' }}"
                                placeholder="Cidade" value="{{ old('address.city') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('address.city') }}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="form-group">
                            <input type="text" name="address[street]"
                                class="form-control  {{ $errors->has('address.street') ? 'is-invalid' : '' }}"
                                id="street" placeholder="Logradouro" value="{{ old('address.street') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('address.street') }}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="text" name="address[number]"
                                class="form-control {{ $errors->has('address.number') ? 'is-invalid' : '' }}"
                                placeholder="Número" value="{{ old('address.number') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('address.number') }}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="address[district]" id="district"
                                class="form-control  {{ $errors->has('address.district') ? 'is-invalid' : '' }}"
                                placeholder="Bairro" value="{{ old('address.district') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('address.district') }}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="address[complement]"
                                class="form-control {{ $errors->has('address.complement') ? 'is-invalid' : '' }}"
                                placeholder="Complemento" value="{{ old('address.complement') }}">
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
                            <input type="text" name="phones[0][number]"
                                class="form-control phone {{ $errors->has('phones.0.number') ? 'is-invalid' : '' }}"
                                placeholder="Telefone" value="{{ old('phones.0.number') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('phones.0.number') }}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="phones[1][number]"
                                class="form-control cellphone {{ $errors->has('phones.1.number') ? 'is-invalid' : '' }}"
                                placeholder="Celular" value="{{ old('phones.1.number') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('phones.1.number') }}
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

    <script src=" {{ asset('vendor/jquery/jquery.min.js') }} "></script>
    <script src="{{ asset('vendor/jquery-mask/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('js/auth/register.js') }}"></script>
@endsection
