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
            <form action="{{route('auth.register.store')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Nome">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="E-mail">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="cpf" placeholder="CPF">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Senha">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success btn-block mt-3">Criar Conta</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
