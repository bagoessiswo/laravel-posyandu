@extends('layouts.main')

@section('container')
<!-- Page Header-->
<header class="masthead" style="background-image: url({{ asset('img/' . $news['slug'] . '.jpg') }})">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1>{{$news['title']}}</h1>
                    <!-- <h2 class="subheading">Problems look mighty small from 150 miles up</h2> -->
                    <span class="meta">
                        Posted by
                        <a href="{{$news['author_ig']}}" target="_blank">{{ $news["author"] }}</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</header>
        <!-- Post Content-->
        <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        {{$news['body']}}
                    </div>
                </div>
            </div>
        </article>
@endsection
    

