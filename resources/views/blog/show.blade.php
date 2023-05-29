@extends('layout')

@section('main')
    <!-- main -->
    <main class="container">
        <section class="single-blog-post">
            <h1>{{ $blogpost->title }}</h1>

            <p class="time-and-author">
                {{ $blogpost->created_at->diffForHumans() }}
                <span>Autors: Adīna</span>
            </p>

            <div class="single-blog-post-ContentImage" data-aos="fade-left">
                <img src="{{ asset('images/'.$blogpost->picture) }}" alt="" />
            </div>

            <div class="about-text">
                {!! $blogpost->content !!}
            </div>
        </section>
    </main>
@endsection
