@extends('layouts.app')
@section('title')
Enregistrer categories
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

    <form action="{{route("categories.store")}}" method="post">
        @csrf
        <p>Nom : <input type="text" name="name"></p>
        <p>Description : <textarea name="description" id="" cols="30" rows="10"></textarea></p>
        <p><button type="submit">Enregistrer</button></p>
    </form>
@endsection