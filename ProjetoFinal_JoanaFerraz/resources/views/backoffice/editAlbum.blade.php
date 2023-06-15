@extends('layout.main')
@section('title')
    <title>Edição de Albuns</title>
@endsection

@section('content')


<form action="{{ route('editarAlbum') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <h1>Editar Album</h1>

        <select class="custom-select" name="bands_id">

            @foreach ($allBands as $item)
                <option @if ($item->id == $myAlbum->bands_id) selected @endif value="{{ $item->id }}">
                    {{ $item->name }}</option>
            @endforeach
        </select>

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input value="{{ $myAlbum->name }}" name="name" type="text" class="form-control" id="name">
        </div>
        <div class="mb-3">
            <label for="exampleInputYear" class="form-label">Ano
            </label>
            <input name="year" type="text" value="{{ $myAlbum->year }}" class="form-control" id="exampleInputYear">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Foto</label>
            <input value="" name="image" type="file" accept="ima ges/*" class="form-control" id="image">
            <input type="hidden" name="id" value="{{ $myAlbum->id }}">
        </div>

        <button class="btn btn-info" type="submit">Salvar</button>

    </div>

</form>
@endsection
