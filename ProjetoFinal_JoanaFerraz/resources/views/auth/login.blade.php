@extends('layout.layoutAuth')

@section('title')
    <title>Login</title>
@endsection

@section('content')
    <div class="container py-5 h-100 ">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">

            <div class="card-body p-5 ">

            <div class="text-center">
              <img src="" class="img-fluid" alt="">
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf

              <div class="form-outline my-4">
                <label class="form-label" for="typeEmailX-2">Email</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" class="form-control "  style="border-radius: 1rem;" />

              </div>
              @error('email')
              Email incorreto
                @enderror
              <div class="form-outline mb-4">
                <label class="form-label" for="typePasswordX-2">Password</label>
               <input name="password" type="password" class="form-control" id="exampleInputPassword1" class="form-control>
                " style="border-radius: 1rem;" />

              </div>
              @error('email')
              Password incorreta
                @enderror




              <button class="btn  btn-lg btn-block btnLogin"   type="submit">Login</button>

            </form>
            <a href="{{ route('register') }}">Ainda não se registou?</a>
            <a href="{{ route('home') }}">voltar</a>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
