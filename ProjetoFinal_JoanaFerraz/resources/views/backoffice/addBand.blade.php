@extends('layout.backofficeLayout')
@section('title')
    <title>Adicionar Bandas</title>
@endsection

@section('contentBack')

<h1>Adicionar Banda</h1>

    <div class="container">
        <form method="POST" action="{{ route('create_band') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputName1" class="form-label">Nome
                </label>
                <input name="name" type="text" value="" class="form-control" id="exampleInputName1"
                    aria-describedby="nameHelp">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Foto</label>
                <input value="" name="image" type="file" accept="images/*" class="form-control" id="image">
                <input type="hidden" name="id" value="">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    <a href="{{ route('backoffice') }}">Voltar</a>
</div>
@endsection
