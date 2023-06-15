@extends('layout.main')

@section('title')
    <title>Home</title>
@endsection

@section('content')
<div class="container-fluid title">
    @if( Auth::user() != null)
<h1>Olá {{ Auth::user()->name }} !!</h1>
@endif
</div>
@endsection


