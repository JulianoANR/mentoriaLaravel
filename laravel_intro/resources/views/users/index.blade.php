@extends('layouts.app')
@section('content')
    <a href="{{ route('users.create') }}">Novo usuário</a>

    <hr>

    <!-- FEIO, HORRIVEL, PODRE E MEDIOCRE -->
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>E-mail</th>
            </tr>
        </thead>
        <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                @endforeach
        </tbody>
    </table>
@endsection