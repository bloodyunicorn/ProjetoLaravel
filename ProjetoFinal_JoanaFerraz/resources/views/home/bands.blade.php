@extends('layout.main')

@section('title')
    <title>Bandas</title>
@endsection
@section('content')
<div class="container-fluid title">
<h1>Bandas</h1>
</div>
<div class="container-fluid">
    <div class="container">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div>
            <form method="GET">
                <select class="custom-select" name="bands_id" onchange="this.form.submit()">
                    <option value="" selected>Bandas</option>
                    @foreach ($allBands as $item)
                        <option @if ($item->id == request()->query('bands_id')) selected @endif value="{{ $item->id }}">
                            {{ $item->name }}</option>
                    @endforeach
                </select>
            </form>
            <form method="GET">
                <input class="" name="search" value="{{ request()->query('search') }}" placeholder="Procurar">
                <button class="btn btn-secondary">Procurar</button>
            </form>
        </div>
        <div class="tabela">
        @foreach ($allBands as $item)
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" "
                                src="{{ $item->image ? asset('uploads/' . $item->image) : asset('../img/no-pic.jpeg') }}"
                                alt="">
            <div class="card-body">
              <h5 class="card-title">{{ $item->name }}</h5>
              <p class="card-text">{{ $item->num }} Albuns</p>
              <a href="{{ route('show_band', $item->id) }}" class="btn btn-primary">Ver Albuns</a>
            </div>
          </div>
          @endforeach
        </div>
    </div>

</div>
@endsection
