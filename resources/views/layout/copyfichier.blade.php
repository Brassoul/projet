<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">libelle</th>
        <th scope="col">prix</th>
        <th scope="col">quantite</th>
        <th scope="col">desciption</th>
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
    <td><?=$item['chemin']?></td>
    <td><a href="{{url('produits/'.$item['id'])}}">CONSULTER</a></td>
  </tr>
  @endforeach
     
  
      </tbody>
  </table>
@endsection



<table class="table" id="example">
    <thead>
  
        <tr>
            <th scope="col">#</th>
            <th scope="col">libellle</th>
            <th scope="col">prix</th>
            <th scope="col">quantite</th>
            <th scope="col">description</th>
            <th scope="col">chemin</th>
            <th scope="col">cathegorie_id</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($produit as $t)
            <tr>
                <th scope="row">{{$t->id}}</th>
                <td>{{$t->libelle}}</td>
                <td>{{$t->prix}}</td>
                <td>{{$t->quantite}}</td>
                <td>{{substr($t->description,0,10)}}...</td>
                <td><a download href="{{ asset('storage/'.$t->chemin)}}" class="btn btn-success">TELECHARGER</a>
                    <a target="_blank" href="{{ asset('storage/'.$t->chemin)}}" class="btn btn-info">Consulter</a></td>
                <td>{{$t->produit->produit}} pour le niveau  {{$t->produit->niveau}}</td>
                <td>
                    <a href="{{ url('produits/'.$t->id ) }}" class="btn btn-sm btn-info">Consulter</a>
                    <form action="{{url('produits/'.$t->id)}}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Supprimer?')" class="btn btn-sm btn-danger">Supprimer</button>
                    </form>
                    <a href="{{ route('produits.edit',[$t->id]) }}" class="btn btn-sm btn-warning">Editer</a>
  
  
                </td>
            </tr>
        @endforeach
  
  
    </tbody>
  </table>
  @foreach ($documents as $t)
  @endforeach
  @endsection
  <script>
  function alerti() {
    swal({
  title: "Are you sure?",
  text: "You will not be able to recover this imaginary file!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: '#DD6B55',
  confirmButtonText: 'Yes, I am sure!',
  cancelButtonText: "No, cancel it!"
  }).then(
  
   function () { return false; });
  }
  </script>