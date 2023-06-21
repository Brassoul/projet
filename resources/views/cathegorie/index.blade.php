@extends('layout/layout');
@section('tableau')
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">CATHEGORIE</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>

@foreach ($cathegorie as $c)
<tr>
  <th scope="row">{{$c->id}}</th>
  <td>{{$c->CATHEGORIE}}</td>
  
  <td><a href="{{url('cathegorie/show/'.$c->id)}}">CONSULTER</a>
    <a href="{{url('cathegorie/edit/'.$c->id)}}">Edit</a>
  
    <form action="{{url('cathegorie/delete/'.$c->id)}}" method="post">
      @csrf
      @method('DELETE')
      <button type="submit">Supprimer</button>
    </form>
    </td>
</tr>
@endforeach
   

    </tbody>
</table>
@endsection
