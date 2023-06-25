<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>categorie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>

<body>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-6 mx-auto shadow rounded bg-dark">

                <h3 class="text-center text-primary text-light">Nouveau categorie </h3>

                <form action="{{ route('categorie.store') }}" method="post" enctype="multipart/form-data"
                    class="text-light needs-validation">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li style="font-weight: bold">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('addSuccess'))
                        <div class="alert alert-success" style="font-weight: bold">
                            {{ session('addSuccess') }}
                        </div>
                    @endif
                    @csrf
                    <div class="mb-3">
                        <label for="categorie" class="form-label">Catégorie : </label>
                        <input required type="text" class="form-control needs-validation" id="categorie"
                            name="categorie" class="@error('categorie') is-invalid @enderror"
                            value="{{ old('categorie') }}">
                    </div>


                    <div class="mb-3">
                        <button class="btn btn-outline-primary">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
