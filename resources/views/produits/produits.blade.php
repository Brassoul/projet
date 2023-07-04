@extends('layout/layout');
@section('content')
    @if (session('editSuccess'))
        <div class="alert alert-success text-light">
            {{ session('editSuccess') }}
        </div>
    @endif
    <title>Bootstrap Multiple Item Product Carousel</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Open+Sans" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/indexStyle.css') }}">
    <script>
        $(document).ready(function() {
            $(".wish-icon i").click(function() {
                $(this).toggleClass("fa-heart fa-heart-o");
            });
        });
    </script>

    <div class="container-xl">
        <div class="row">
            <div class="col-md-12">
                <h2>Featured <b>Products</b></h2>
                <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
                    <!-- Carousel indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>
                    <!-- Wrapper for carousel items -->
                    <div class="carousel-inner">
                        <div class="item carousel-item active">
                            <div class="row bg-dark mx-1 rounded">
                                @foreach ($produits as $produit)
                                    <div class="col-sm-3 my-2 shadow-lg">
                                        <div class="thumb-wrapper">
                                            <span class="wish-icon mt mb-2 btn btn-dark text-light"><i
                                                    class="bi bi-megaphone-fill"></i></span>
                                            <span class="wish-icon mb-2 btn btn-warning text-light"><i
                                                    class="bi bi-eye-fill"></i></span>
                                            <div class="img-box">
                                                <img src="{{ asset("/storage/$produit->chemin") }}"
                                                    class="img-fluid rounded" alt="" />
                                            </div>
                                            <div class="qrcode">
                                                {{ $qrcode[$produit->id] }}
                                            </div>
                                            <div class="thumb-content">
                                                <h4>{{ $produit->libelle }}</h4>
                                                <div class="star-rating">
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item">
                                                            <i class="fa fa-star"></i>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <i class="fa fa-star"></i>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <i class="fa fa-star"></i>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <i class="fa fa-star"></i>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <i class="fa fa-star-o"></i>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <p class="item-price">
                                                    <b>{{ $produit->prix }}</b>
                                                </p>
                                                <a href="#" class="btn btn-primary">Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Carousel controls -->

                    <a class="carousel-control-prev" href="{{ $produits->previousPageUrl() }}" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="carousel-control-next" href="{{ $produits->nextPageUrl() }}" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
