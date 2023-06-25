@extends('layout.layout')
<link rel="stylesheet" href="{{ asset('css/commentStyle.css') }}">
@section('content')
    <!-- Main Body -->
    <section>
        <div class="container">
            <div class="row bg-black">
                <div class="col-sm-5 col-md-6 col-12 pb-4">
                    <h1>Comments</h1>
                    <hr class="text-light">
                    <div class="btn btn-dark">
                        {{ $commentaires->links() }}
                    </div>
                    <hr class="text-light">
                    @foreach ($commentaires as $comment)
                        <div
                            class="@if ($comment->id % 2 != 0) comment mt-4 text-justify float-left @else text-justify darker mt-4 float-right @endif">
                            <img src="https://i.imgur.com/yTFUilP.jpg" alt="" class="rounded-circle" width="40"
                                height="40">
                            <h4 class="text-uppercase">{{ $comment->mail }}</h4>
                            <span> Le {{ $comment->created_at->format('d-m-Y à H:i') }}</span>
                            <br>
                            <p>{{ $comment->commentaire }}</p>
                            <hr class="text-light">
                            <p class="btn btn-light text-dark text-uppercase">{{ $comment->produit->libelle }} :
                                {{ $comment->produit->prix }}</p>
                        </div>
                    @endforeach

                </div>

                <div class="col-lg-4 col-md-5 col-sm-4 offset-md-1 offset-sm-1 col-12 mt-4">
                    <form action="{{ route('commentaire.store') }}" method="post" id="algin-form">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li style="font-weight: bold" class="text-light">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('addSuccess'))
                            <div class="alert alert-success text-light">
                                {{ session('addSuccess') }}
                            </div>
                        @endif
                        <div class="form-group">
                            @csrf
                            <h4>Leave a comment</h4>
                            <label for="message">Message</label>
                            <textarea name="commentaire" id=""commentaire cols="30" rows="5" class="msg form-control"
                                style="background-color: black;"></textarea>
                        </div>
                        <div class="form-group" hidden>
                            <label for="name">Nom Utilisateur</label>
                            <input type="text" name="mail" id="fullname" class="form-control"
                                value="{{ Auth::user()->name }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Produits</label>
                            <select class="form-select bg-black text-light" aria-label="Default select example"
                                name="produits_id">
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
                            <input type="text" name="users_id" id="users_id" class="form-control"
                                value="{{ Auth::user()->id }}">
                        </div>

                        <div class="form-inline">
                            <input type="checkbox" name="check" id="checkbx" class="mr-1">
                            <label for="subscribe">Subscribe me to the newlettter</label>
                        </div>
                        <div class="form-group">
                            <button type="submit" id="post" class="btn">Post Comment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
