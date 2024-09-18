<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pays</title>
</head>
<body>
    <h1>{{$title}}</h1>

    <table border="1px">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pays as $key => $item)
            <tr>
                <td>{{ $item["id"]}}</td>
                {{-- <td><a href="/pays/{{$key}}">{{ $item["title"]}}</a></td> --}}
                <td><a href="{{route('detailPays', $key)}}">{{ $item["title"]}}</a></td>
            </tr>
            @endforeach 
        </tbody>
    </table>
</body>
</html>
