@extends('layout')

@section('content')

<style> 
    .container2 {
        display: flex;
        align-items: flex-start;
        justify-content: center; 
        flex-direction: column;
        background-image: url({{ asset('images/coffee.jpg') }});
        background-size: cover;
        background-position: center; 
        height: 100vh;
        padding-top:0vh;
        color: white; 
        padding-left: 20vh;
    }

    .form-group {
        margin-top: 10px;
    }

    .form-control {
        margin-bottom: 1rem;
        border-radius: 10px;
        radius: 20px;
        padding: 8px;
        width: 100%;
    }

    .btn-primary {
        font-size: 1rem;
        border-radius: 50px;
        padding: 12px 24px;
    }

</style>

<div class="container2">
    <div class="col-md-6">
        <h1>Rediģēt ieraksta datus</h1>
        <form action="{{route('dienasgramata.update', $note->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group mt-4">
                <label>Dienas laiks</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $note->title) }}">
            </div>
            <div class="form-group mt-4">
                <label>Cukura līmenis</label>
                <input type="text" name="cuklim" class="form-control" value="{{ old('cuklim', $note->cuklim) }}">
            </div>
            <div class="form-group mt-4">
                <label>Ogļhidrāti</label>
                <input type="text" name="oglhidrati" class="form-control" value="{{ old('oglhidrati', $note->oglhidrati) }}">
            </div>
            <div class="form-group mt-4">
                <label>Insulīna tips</label>
                <input type="text" name="insultips" class="form-control" value="{{ old('insultips', $note->insultips) }}">
            </div>
            <div class="form-group mt-4">
                <label>Insulīna deva</label>
                <input type="text" name="insuldev" class="form-control" value="{{ old('insuldev', $note->insuldev) }}">
            </div>
            <div class="form-group mt-4">
                <label> Korekcijas deva</label>
                <input type="text" name="kordev" class="form-control" value="{{ old('kordev', $note->kordev) }}">
            </div>
            <div class="form-group mt-4">
                <label>Piezīmes</label>
                <input type="text" name="content" class="form-control" value="{{ old('content', $note->content) }}">
            </div>
            <div class="form-group mt-4">
                <button type="submit" class="btn btn-sm btn-primary">Izlabot ierakstu</button>
            </div>
        </form>
    </div>
</div>
@endsection