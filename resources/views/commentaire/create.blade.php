<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CATHEGORIE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>

<body>

    <div class="container my-5 text-light">
        <div class="row">
            <div class="col-md-6 mx-auto shadow bg-black rounded">
                @if (session('addSucess'))
                    <div class="alert alert-danger">
                        {{ session('addSuccess') }}
                    </div>
                @endif
                {{-- ['mail','commentaire','produits_id'] --}}
                <h3 class="text-center text-warning my-2">Nouveau Commentaire </h3>

                <form action="{{ route('commentaire.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3" hidden>
                        <label for="mail" class="form-label">Nom Utilisateur : </label>
                        <input required type="text" class="form-control" id="mail" name="mail"
                            value="{{ Auth::user()->name }}" >
                    </div>

                    <div class="mb-3">
                        <label for="commentaire" class="form-label">Commentaire : </label>
                        <textarea required type="text" class="form-control" id="commentaire" name="commentaire"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="produits_id" class="form-label">Produit : </label>
                        {{-- <input required type="text" class="form-control" id="produits_id" name="produits_id"> --}}
                        <select class="form-select" aria-label="Default select example" name="produits_id">
                            <option selected>Open this select menu</option>
                            @foreach ($produit as $p)
                                <option value="{{ $p->id }}"
                                    @if ($p->id == $productSelect->id) @selected(true) @endif>{{ $p->libelle }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3" hidden>
                        <label for="users_id" class="form-label">users_id : </label>
                        <input type="text" name="users_id" id="users_id" class="form-control" value="{{Auth::user()->id}}">
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
