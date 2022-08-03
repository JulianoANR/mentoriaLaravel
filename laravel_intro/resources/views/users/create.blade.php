@extends('layouts.app')
@section('content')
    <form method="POST" action="/users">
        @csrf

        <label>Nome</label>
        <input type="text" name="name">

        <br>

        <label>E-mail</label>
        <input type="text" name="email">

        <br><br>

        <button type="submit">Cadastrar</button>
        <a href="{{ route('users.index') }}"><button type="button">VOLTAR</button></a>
    </form>
@endsection