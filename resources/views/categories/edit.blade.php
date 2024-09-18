@extends('layouts.app')
@section('title')
Modifier categories
@endsection

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
    <h1>Enregistrer categories</h1>

    <form action="{{route("categories.update", $categorie->id)}}" method="post">
        @csrf
        @method("PUT")
        <p>Nom : <input type="text" name="name" value="{{$categorie->name}}"></p>
        <p>Description : <textarea name="description" id="" cols="30" rows="10">{{$categorie->description}}</textarea></p>
        <p><button type="submit">Enregistrer</button></p>
    </form>
@endsection