@extends('layout.main')
@section('title')
    <title>Edição de Bandas</title>
@endsection

@section('content')


<form action="{{ route('editarBanda') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <h1>Editar Banda</h1>

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input value="{{ $myBand->name }}" name="name" type="text" class="form-control" id="name">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Foto</label>
            <input value="" name="image" type="file" accept="ima ges/*" class="form-control" id="image">
            <input type="hidden" name="id" value="{{ $myBand->id }}">
        </div>

        <button class="btn btn-info" type="submit">Salvar</button>

    </div>

</form>
@endsection
