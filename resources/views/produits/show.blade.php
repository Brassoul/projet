@extends('layout/layout');
@section('tableau')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&family=Roboto:wght@300&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/productShow.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <main>
        <div class="cards my-5">
            <img src="{{ asset("/storage/$produit->chemin") }}" alt="">
            <div class="card-content">
                <h2 class="text-dark">
                    {{ $produit->libelle }}
                </h2>
                <a class="button">
                    <div class="btn btn-sm btn-warning text-white">Prix : {{$produit -> prix}}</div>
                    <div class="btn btn-sm btn-warning text-white">Quantité : {{$produit -> quantite}}</div>
                    <div class="btn btn-sm btn-warning text-white">Catégorie : {{$produit ->categorie->categorie}}</div>
                </a>
                <p class="description">
                    {{ $produit->description }}
                </p>
            </div>
        </div>
    </main>
    <a href="{{ route('commentaire.index', ['id'=>$produit->id]) }}" class="btn btn-success mx-5">Laisser Un Commentaire</a>
@endsection
