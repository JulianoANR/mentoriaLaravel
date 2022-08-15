@extends('layouts.app')
@section('content')
<a href="{{ route('user.index') }}">Listagem de usuarios</a>
<br><br>

<form action="{{ route('user.store') }}" method="POST">
    @csrf
    <label>Nome</label>
    <input type="text" name="name">

    <br>

    <label>E-mail</label>
    <input type="text" name="email">

    <br>

    <button type="submit">Cadastrar</button>
</form>
@endsection
