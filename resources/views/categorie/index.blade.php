@extends('layout/layout');
@section('content')
    @if (session('editSuccess'))
        <div class="alert alert-success text-center text-light" style="font-weight: bold">
            {{ session('editSuccess') }}
        </div>
    @endif
@endsection
@section('tableau')
    <table class="table table-borderless shadow-lg rounded">
        <thead class="text-center">
            <tr>
                <th scope="col">#</th>
                <th scope="col">categorie</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody class="text-center" style="font-weight: bold;">

            @foreach ($categorie as $c)
                <tr>
                    <th scope="row">{{ $c->id }}</th>
                    <td>{{ $c->categorie }}</td>

                    <td>
                        <a class="btn btn-warning" href="{{ route('categorie.edit', ['id' => $c->id]) }}">Edit</a>

                        <form action="{{ url('categorie/delete/' . $c->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
@endsection
