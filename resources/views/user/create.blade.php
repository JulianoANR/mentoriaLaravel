<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro</title>
</head>

<body>
    <form action="/user" method="POST">
        @csrf
        <label>Nome</label>
        <input type="text" name="name">

        <br>

        <label>E-mail</label>
        <input type="text" name="email">

        <br>

        <button type="submit">Cadastrar</button>
    </form>
</body>

</html>
