
@php
    use App\Models\User;
@endphp
@include('layout.main')

    @if (Auth::user()->user_type == User::admin)
    @yield('contentBack')



    @yield('endcontentBack')
    @else
    <h1>Não tem acesso</h1>
@endif


