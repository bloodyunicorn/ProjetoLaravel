@extends('layout.backofficeLayout')
@section('title')
    <title>Adicionar Album</title>
@endsection

@section('contentBack')

<h1>Adicionar Album</h1>

<div class="container">
    <form method="POST" action="{{ route('create_album') }}" enctype="multipart/form-data">
        @csrf
        <select class="custom-select" name="bands_id">
            <option value="" selected>Todos as Bandas</option>
            @foreach ($allBands as $item)
                <option @if ($item->id == request()->query('bands_id')) selected @endif value="{{ $item->id }}">
                    {{ $item->name }}</option>
            @endforeach
        </select>

        @error('bands_id')
            <div id="nameHelp" class="form-text">Seleccione uma banda</div>
        @enderror

        <div class="mb-3">
            <label for="exampleInputName1" class="form-label">Nome
            </label>
            <input name="name" type="text" value="" class="form-control" id="exampleInputName1"
                aria-describedby="nameHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputYear" class="form-label">Ano
            </label>
            <input name="year" type="text" value="" class="form-control" id="exampleInputYear">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Foto</label>
            <input value="" name="image" type="file" accept="ima ges/*" class="form-control" id="image">
            <input type="hidden" name="id" value="">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

<a href="{{ route('backoffice') }}">Voltar</a>
</div>
@endsection
