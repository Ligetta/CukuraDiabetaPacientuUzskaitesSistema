@extends('layout')

@section('content')

<style> 
    .container2 {
        display: flex;
        align-items: center;
        justify-content: center; 
        flex-direction: column;
        background-image: url({{ asset('images/paper.jpg') }});
        background-size: cover;
        background-position: center; 
        height: 100vh;
        width: 100%;
        color: black; 
    }

    .card-text{
        font-size: 20px;
        margin: 10px;
    }

    .btn-primary2 {
        font-size: 1rem;
        border-radius: 40px;
        padding: 10px 20px ;
        font-color: black;
    }

</style>

<div class="container2">
    <div class="col-md-6">
        <h3>Ieraksta laiks: {{$note->title}} {{$note->created_at}}</h1>
        <div class="card my-4">
            <div class="card-body">
                <p class="card-text">Cukura līmenis: {{ number_format($note->cuklim, 1) }}</p>
                <p class="card-text">Ogļhidrātu daudzums: {{ number_format($note->oglhidrati, 1) }}</p>
                <p class="card-text">Insulīna tips: {{$note->insultips}}</p>
                <p class="card-text">Insulīna deva: {{$note->insuldev}}</p>
                <p class="card-text">Insulīna korekcijas deva: {{$note->kordev}}</p>
                <p class="card-text">Piezīmes par šo brīdi: {{$note->content}}</p>
                <button class="btn-primary2"><a href="{{route('dienasgramata.edit', $note)}}" style="color:black;">Rediģēt</button></a>
            </div>
        </div>
    </div>
</div>
@endsection