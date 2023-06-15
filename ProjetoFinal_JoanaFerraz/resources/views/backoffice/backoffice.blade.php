
@php
    use App\Models\User;
@endphp
@extends('layout.main')

@section('title')
    <title>Edição de Bandas</title>
@endsection

@section('content')



<div class="container-fluid title">

    @if (Auth::user()->user_type == User::admin)
<a class="btn btn-dark" href="{{ route('add_Band') }}"> Adicionar Banda</a>
<a class="btn btn-dark" href="{{ route('add_Album') }}"> Adicionar Album</a>
@endif
<h1>Edição de Bandas</h1>
</div>
@if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
<div class="container">
<table class="table ">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($allBands as $item)
            <tr>
                <td><img width="30px" height="30px"
                    src="{{ $item->image ? asset('uploads/' . $item->image) : asset('img/no-pic.jpeg') }}"
                    alt=""></td>
                <td>{{ $item->name }}</td>
                <td></td>
                <td></td>
                <td>
                    <a href="{{ route('editBand', $item->id) }}"><button class="btn btn-info">Editar</button></a>
                    @if (Auth::user()->user_type == User::admin)
                    <a href="{{ route('delete_band', $item->id) }}"><button
                        class="btn btn-danger">Eliminar</button></a>
                @endif

                </td>


            </tr>
        @endforeach

    </tbody>
</table>

    <div class="container-fluid title">
        <h1>Edição de Albuns</h1>
        </div>

        <table class="table ">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Year</th>

                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($allAlbums as $item)
        <tr>
            <td><img width="30px" height="30px"
                src="{{ $item->image ? asset('uploads/' . $item->image) : asset('img/no-pic.jpeg') }}"
                alt=""></td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->year }}</td>
            <td>
                <a href="{{ route('editAlbum', $item->id) }}"><button class="btn btn-info">Editar</button></a>
                @if (Auth::user()->user_type == User::admin)
                <a href="{{ route('delete_album', $item->id) }}"><button
                    class="btn btn-danger">Eliminar</button></a>
            @endif

            </td>
        </tr>
    @endforeach

    </tbody>


</table>

</div>
@endsection
