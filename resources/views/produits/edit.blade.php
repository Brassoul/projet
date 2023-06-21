<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>produit</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body>
   
<div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto shadow">
                @if (session("addSucess"))
                    <div class="alert alert-danger">
                        {{ session("addSuccess") }}
                    </div>
                @endif
                <h3 class="text-center text-primary">Nouveau produit </h3>
               
                <form action="{{ route('produits.update',['id'=>$produit->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="libelle" class="form-label">Libelle : </label>
                        <input required type="text" value="{{$produit->libelle}}" class="form-control" id="libelle" name="libelle">
                    </div>
                    <div class="mb-3">
                        <label for="prix" class="form-label">Prix : </label>
                        <input required type="number" value="{{$produit->prix}}" min="0" class="form-control" id="prix" name="prix">
                    </div>
                    <div class="mb-3">
                        <label for="prix" class="form-label">quantite : </label>
                        <input required type="number" value="{{$produit->quantite}}"  min="1" class="form-control" id="quantite" name="quantite">
                    </div>
                    <div class="mb-3">
                        <textarea name="description" id="description" class="form-control">{{$produit->description}}</textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="chemin" class="form-label">chemin : </label>
                        <input required type="file" class="form-control" id="chemin" name="chemin">
                    </div>
                    <div class="mb-3">
                        <label for="prix" class="form-label">cathegorie : </label>
                        <select class="form-select" aria-label="Default select example" name="cathegorie_id">
                            <option selected>Open this select menu</option>
                            @foreach ($cathegorie as $c)
                                <option value="{{$c->id}}">{{$c->CATHEGORIE}}</option>
                            @endforeach
                          </select>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-sm btn-primary">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div> 
</body>
</html>