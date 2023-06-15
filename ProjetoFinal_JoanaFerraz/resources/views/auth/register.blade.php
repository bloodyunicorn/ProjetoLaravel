@extends('layout.layoutAuth')

@section('title')
    <title>Register</title>
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
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" value="" id="exampleInputEmail1"
                        aria-describedby="emailHelp">

                    @error('email')
                        <div id="emailHelp" class="form-text">Insira um email válido.</div>
                    @enderror

                </div>
                <div class="mb-3">
                    <label for="exampleInputName1" class="form-label">Nome
                    </label>
                    <input name="name" type="text" value="" class="form-control" id="exampleInputName1"
                        aria-describedby="nameHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input name="password" value="" type="password" class="form-control" id="exampleInputPassword1">
                </div>

                <button class="btn  btn-lg btn-block btnLogin" type="submit">Submit</button>
            </form>
            <a href="{{ route('home') }}">Voltar</a>
        </div>

            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
