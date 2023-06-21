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
               
                
                <form action="{{ route('cathegorie.update',['id'=>$cathegorie->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="CATHEGORIE" class="form-label">CATHEGORIE : </label>
                        <input required type="text" value="{{$cathegorie->CATHEGORIE}}" class="form-control" id="CATHEGORIE" name="CATHEGORIE">
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