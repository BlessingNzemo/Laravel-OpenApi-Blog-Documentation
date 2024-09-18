<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Enregistrer pays</h1>

    <form action="{{route('savePays')}}" method="post">
        @csrf
        <p>Nom : <input type="text" name="name"></p>
        <p>Capital : <input type="text" name="capital"></p>
        <p><button type="submit">Enregistrer</button></p>
    </form>
</body>
</html>
