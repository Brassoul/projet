<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>

<body>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-6 mx-auto shadow-lg bg-black rounded text-light">

                <h3 class="text-center text-primary my-1 text-warning">Modification du Produit </h3>

                <form action="{{ route('produits.update', ['id' => $produit->id]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="libelle" class="form-label">Libelle : </label>
                        <input required type="text" value="{{ $produit->libelle }}" class="form-control"
                            id="libelle" name="libelle">
                    </div>
                    <div class="mb-3">
                        <label for="prix" class="form-label">Prix : </label>
                        <input required type="number" value="{{ $produit->prix }}" min="0" class="form-control"
                            id="prix" name="prix">
                    </div>
                    <div class="mb-3">
                        <label for="prix" class="form-label">Quantite : </label>
                        <input required type="number" value="{{ $produit->quantite }}" min="1"
                            class="form-control" id="quantite" name="quantite">
                    </div>
                    <div class="mb-3">
                        <textarea name="description" id="description" class="form-control">{{ $produit->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="chemin" class="form-label">Image : </label>
                        <input type="file" class="form-control" id="chemin" name="chemin">
                    </div>
                    <div class="mb-3">
                        <label for="prix" class="form-label">Categorie : </label>
                        <select class="form-select bg-black text-light" aria-label="Default select example"
                            name="categorie_id">
                            <option>Open this select menu</option>
                            @foreach ($categorie as $c)
                                <option value="{{ $c->id }}" @class(['text-light', 'font-bold' => true]) @if ($c->id == $produit->categorie_id)
                                    @selected(true)
                            @endif>
                            {{ $c->categorie }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary">Modifier</button>
                    </div>
                </form>
            </div>
            <div class="col-md-2">
                <img src="/storage/{{ $produit->chemin }}" alt="" width="200" height="200"
                    style="border: 4px solid #e9d8 b7; border-radius: 5%;">
            </div>
        </div>
    </div>
</body>

</html>
