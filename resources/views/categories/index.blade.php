@extends('layouts.app')

@section('title')
    Liste des categories
@endsection

@section('content')
  <h1>Liste des categoires</h1>

  <a href="{{route("categories.create")}}" class="btn btn-primary">Enregistrer</a>
  <table class="table">
      <thead>
          <tr>
              <th>No</th>
              <th>Date</th>
              <th>Nom</th>
              <th>Description</th>
              <th>Action</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($categories as $key => $item)
              <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$item->created_at}}</td>
                  <td>{{$item->name}}</td>
                  <td>{{$item->description}}</td>
                  <td>
                      <a href="{{route("categories.show", $item->id)}}" class="btn btn-primary">Voir plus</a>
                      <a href="{{route("categories.edit", $item->id)}}" class="btn btn-primary">Editer</a>
                      <a href="{{route("categories.destroy", $item->id)}}" class="btn btn-primary" onclick="supprimer(event)" data-bs-toggle="modal" data-bs-target="#exampleModal">Supprimer</a>
                  </td>
              </tr>
          @endforeach
      </tbody>
  </table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Suppression de categorie</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Voulez-vous vraiment supprimer cette categorie ?
      </div>
      <form action="" method="post">
        @csrf
        @method("DELETE")
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Supprimer</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection

@section('scripts')
    <script>
      function supprimer(event) {          
        const lien = event.target.getAttribute('href')
        document.querySelector("#exampleModal form").setAttribute("action", lien)
      }
    </script>
@endsection