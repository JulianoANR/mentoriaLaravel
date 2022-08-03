<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="sum">
        @csrf <!-- um token que validará a requisição -->

        <label>A</label>
        <input type="text" name="a">

        <br>

        <label>B</label>
        <input type="text" name="b">

        <br>

        <button type="submit">Somar</button>
    </form>
</body>
</html>