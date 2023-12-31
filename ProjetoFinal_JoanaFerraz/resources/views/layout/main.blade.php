
@php
    use App\Models\User;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('title')

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/style.css">

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous" defer>
    </script>
</head>


<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">Projeto Laravel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('bands') }}">Bandas</a>
                    </li>

@auth                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('backoffice') }}">Backoffice</a>
                    </li>
            @endauth
                </ul>
            </div>
        </div>

            <div class="nav-user">

                @if(Auth::user() !=null )

                <form action="{{ route('logout') }}" method="POST">

                @csrf
                    <button type="submit">Logout</button>
                </form>
            @else
            <form action="{{ route('login') }}" method="GET">
            <button type="submit" >Log
                    in</button>
                </form>
                <form action="{{ route('register') }}" method="GET">
                    <button type="submit" >Register</button>
                        </form>

                @endif

            </div>

    </nav>

    @yield('content')



    @yield('endcontent')


</body>

</html>
