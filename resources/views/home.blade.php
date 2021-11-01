@extends('layouts.main')
@section('container')
  <!-- Page Header-->
  <header class="masthead" style="background-image: url({{ asset('img/home-bg.jpg') }})">
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
  <!-- Main Content-->
  <div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
      <div class="col-md-10 col-lg-8 col-xl-7">
      @foreach ($news as $blog_asip)
        <!-- Post preview-->
        <div class="post-preview">
            <a href="/news/{{ $blog_asip["slug"] }}">
                <h2 class="post-title">{{ $blog_asip["title"] }}</h2>
                <h3 class="post-subtitle">{{$blog_asip["body"]}}</h3>
            </a>
            <p class="post-meta">
                Posted by
                <a href="{{$blog_asip['author_ig']}}" target="_blank">{{ $blog_asip["author"] }}</a>
            </p>
        </div>
        <!-- Divider-->
        <hr class="my-4" />
      @endforeach
          <!-- Pager-->
          <!-- <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div> -->
      </div>
    </div>
  </div>
@endsection