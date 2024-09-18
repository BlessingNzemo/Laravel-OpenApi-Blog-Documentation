@extends('layouts.app')

@section('title')
Modification Etiquettes
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

    <h1>Modification etiquette</h1>

    <form action="etiquettes.update" method="post">
        @csrf
        @method("PUT")
        <p>Nom : <input type="text" name="name" value="{{$etiquettes->name}}"></p>
        <p>Description : <textarea name="description" id="" cols="30" rows="10">{{$etiquettes->description}}</textarea></p>
        <p><button type="submit">Enregistrer</button></p>
    </form>
@endsection
