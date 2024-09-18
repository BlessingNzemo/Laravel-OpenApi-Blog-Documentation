@extends('layouts.app')

@section('title')
    Liste des categories
@endsection

@section('content')
    <h1>Liste des categoires</h1>

    <a href="{{route("categories.create")}}">Enregistrer</a>

    <div style="justify-content: center">
        <div style="float: left">
            <h2>Nom</h2>
            <p>{{$categorie->name}}</p>
        </div>
        
        <div style="float: left">
            <h2>Description</h2>
            <p>{{$categorie->description}}</p>
        </div>
    </div>

@endsection
