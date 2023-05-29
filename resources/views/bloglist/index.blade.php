@extends('layout')

@section('main')
    <!-- main -->
    <main class="container">
        <h2 class="header-title">Visi blogi:</h2>
        <div class="searchbar">
            <form action="{{ route('bloglist.index') }}" method="GET">
                <input type="text" placeholder="Meklēt..." name="search" value="{{ request('search') }}" />

                <button type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </form>
        </div>
        <section class="cards-blog latest-blog">
            @foreach($blogposts as $blogpost)
                <div class="card-blog-content">
                    <img src="{{ asset('images/'.$blogpost->picture) }}" alt="" />
                    <p>
                        {{ $blogpost->created_at->diffForHumans() }}
                        <span>Autors: Adīna</span>
                    </p>
                    <h4>
                        <a href="{{ route('show-blog', ['id' => $blogpost->id]) }}">{{ $blogpost->title }}</a>
                    </h4>
                </div>
            @endforeach
        </section>
    </main>
@endsection
