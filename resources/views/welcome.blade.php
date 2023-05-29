@extends('layout')

@section('header')
    <!-- header -->
    <header class="header" style="background-image: url({{ asset('images/photography.jpg') }});">
        <div class="header-text">
            <h1>Cukura Diabēta Sistēma</h1>
            <h4>Vieta kur Jums parūpēties par sevi un savu diabētu...</h4>
        </div>
        <div class="overlay"></div>
    </header>
@endsection

@section('main')
    <!-- main -->
    <main class="container">
        <h2 class="header-title">Pēdējie bloga posti</h2>
        <section class="cards-blog latest-blog">
            @foreach($blogposts as $blogpost)
                <div class="card-blog-content">
                    <img src="{{ asset('images/'.$blogpost->picture) }}" alt="" />
                    <p>
                        {{ $blogpost->created_at->diffForHumans() }}
                        <span style="float: right">Autors: Adīna</span>
                    </p>
                    <h4 style="font-weight: bolder">
                       <a href="{{ route('blog.show', ['id' => $blogpost->id]) }}">{{ $blogpost->title }}</a>
                    </h4>
                </div>
            @endforeach
        </section>
    </main>
@endsection
