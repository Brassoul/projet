@extends('layout/layout');
@section('tableau')
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Mail</th>
      <th scope="col">Commentaire</th>
      <th scope="col">Produit</th>
    </tr>
  </thead>
  <tbody>

@foreach ($commentaire as $c)
  
<tr>
  <th scope="row">{{$c->id}}</th>
  <td>{{$c->mail}}</td>
  <td>{{$c->commentaire}}</td>
  <td>{{$c->produit->libelle}}</td>
  
  {{-- <td><a href="{{url('commentaire/show/'.$c->id)}}">CONSULTER</a>
    <a href="{{url('commentaire/edit/'.$c->id)}}">Edit</a>
  
    <form action="{{url('commentaire/delete/'.$c->id)}}" method="post">
      @csrf
      @method('DELETE')
      <button type="submit">Supprimer</button>
    </form>
    </td> --}}
</tr>
@endforeach
   

    </tbody>
</table>
@endsection
