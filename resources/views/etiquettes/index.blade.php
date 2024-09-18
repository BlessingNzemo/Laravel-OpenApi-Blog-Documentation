@extends('layouts.app')

@section('title')
    Liste des Etiquettes
@endsection

@section('content')
    <h1>Liste des Etiquettes</h1>

    <p><a href="{{route('etiquettes.create')}}">Enregistrer</a></p>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($etiquettes as $key => $item)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->description}}</td>
                    <td>
                        <a href="{{route("etiquettes.show", $item->id)}}" class="btn btn-primary">Voir plus</a>
                        <a href="{{route("etiquettes.edit", $item->id)}}" class="btn btn-primary">Editer</a>
                        <a href="{{route("etiquettes.destroy", $item->id)}}" onclick="supprimer(event)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Supprimer</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection

@section('scripts')
    <script>
        function Supprimer(event){
            const lien = event.target.getAttribute("href")
            const tr = event.target.getAttribute("tr")
            if (confirm(Voulez-vous vraiment supprimer ?)){
                tr.remove()
            }
        }
    </script>
@endsection