@extends('layouts.main')

@section('container')
<header class="masthead" style="background-image: url({{ asset('img/login-bg.jpg') }})">)">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>ASIPS</h1>
                    <span class="subheading">Child Is Our Future</span>
                </div>
            </div>
        </div>
    </div>
  </header>
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
        <form class="form-signin" action="/login" method="GET">
            {{ csrf_field() }}
            <h1 class="h3 mb-3 font-weight-normal">Silakan Login</h1>
            <label for="inputEmail" class="sr-only">Username</label>
            <input type="text" id="inputEmail" class="form-control" placeholder="Username" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
            {{-- <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
            </div> --}}
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>
        </div>
    </div>
</div>
@endsection

