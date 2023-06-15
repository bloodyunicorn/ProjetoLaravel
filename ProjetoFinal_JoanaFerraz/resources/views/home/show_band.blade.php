@extends('layout.main')

@section('title')
    <title>{{ $myBand->name }}</title>
@endsection

@section('content')



<div class="container ">
            <h2 class="text-center">Albuns de {{ $myBand->name }}</h2>

            <div class="container tabela">
                    @foreach ($allAlbums as $item)
        <div class="card " style="width: 18rem;">
            <img class="card-img-top" "
                                src="{{ $item->image ? asset('uploads/' . $item->image) : asset('../img/no-pic.jpeg') }}"
                                alt="">
            <div class="card-body">
              <h5 class="card-title">{{ $item->name }}</h5>
              <p class="card-text">Ano de lançamento: {{ $item->year }}</p>
            </div>
          </div>

                    @endforeach

                </div>
</div>
@endsection
