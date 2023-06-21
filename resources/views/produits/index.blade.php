@extends('layout/layout');
@section('tableau')
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">libelle</th>
      <th scope="col">prix</th>
      <th scope="col">quantite</th>
      <th scope="col">desciption</th>
      <th scope="col">Categorie</th>
     <th scope="col">chemin</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>

@foreach ($produits as $item)
<tr>
  <th scope="row"><?=$item['id']?></th>
  <td><?=$item['libelle']?></td>
  <td><?=$item['prix']?></td>
  <td><?=$item['quantite']?></td>
  <td><?=$item['description']?></td>
  <td><?=$item->cathegorie->CATHEGORIE?></td>
  <td> <img style="width: 40%" src="{{asset("/storage/$item->chemin")}}" alt=""></td>
  <td><a href="{{url('produits/show/'.$item['id'])}}">CONSULTER</a>
  <a href="{{url('produits/edit/'.$item['id'])}}">Edit</a>
  
    <form action="{{url('produits/delete/'.$item['id'])}}" method="post">
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
