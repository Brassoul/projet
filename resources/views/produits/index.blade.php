@extends('layout/layout');
@section('content')
    @if (session('editSuccess'))
        <div class="alert alert-success text-light">
            {{ session('editSuccess') }}
        </div>
    @endif
    @if (session('addSuccess'))
        <div class="alert alert-success text-light">
            {{ session('addSuccess') }}
        </div>
    @endif
@endsection
@section('tableau')
    <table class="table">
        <thead class="text-center">
            <tr>
                <th scope="col">#</th>
                <th scope="col">libelle</th>
                <th scope="col">prix</th>
                <th scope="col">quantite</th>
                <th scope="col">desciption</th>
                <th scope="col">Categorie</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody class="text-center">

            @foreach ($produits as $item)
                @php
                    $lengthText = Str::length($item->description);
                    $limitText = Str::limit($item->description, 20);
                    $fullTextUrl = route('produits.show', ['id' => $item->id]);
                @endphp
                <tr>

                    <th scope="row"><?= $item['id'] ?></th>
                    <td><?= $item['libelle'] ?></td>
                    <td><?= $item['prix'] ?></td>
                    <td><?= $item['quantite'] ?></td>
                    <td>
                        @if ($lengthText < 10)
                            {{ $item->description }}
                        @else
                            {{ $limitText }}<a href="{{ $fullTextUrl }}" class="btn btn-sm btn-success">Voir plus...</a>
                        @endif
                    </td>
                    <td>{{ $item->categorie->categorie }}</td>
                    <td>
                        <a class="btn btn-success" href="{{ route('produits.show', ['id' => $item->id]) }}">
                            <i class="bi bi-eye-fill"></i>
                        </a>
                        <a class="btn btn-warning" href="{{ url('produits/edit/' . $item['id']) }}">
                            <i class="bi bi-pen"></i>
                        </a>

                        <form action="{{ url('produits/delete/' . $item['id']) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
@endsection
