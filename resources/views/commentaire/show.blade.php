@extends('layout/layout');
@section('tableau')
<ul>
    <li>Id:{{$produit->id}}</li>
    <li>Libelle:{{$produit->libelle}}</li>
    <li>Prix:{{$produit->prix}}</li>
    <li>Quantite:{{$produit->quantite}}</li>
    <li>Description:{{$produit->description}}</li>
    <li>Chemin:<img style="width: 40%" src="{{asset("/storage/$produit->chemin")}}" alt=""></li>
    <li>cathegorie:{{$produit->cathegorie->CATHEGORIE}}</li>
    
    
</ul>



@endsection
