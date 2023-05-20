@extends('layout')

@section('content')
<style> 
    .container2 {
        display: flex;
        align-items: flex-start;
        justify-content: center; 
        flex-direction: column;
        background-image: url({{ asset('images/clock.jpg') }});
        background-size: cover;
        background-position: center; 
        height: 100vh;
        width: 100%;
        padding-top: 50px;
        color: black; 
        padding-left: 20vh;
    }

    .form-group {
        margin-top: 10px;
        font-size: 18px;
    }

    .form-control {
        margin-bottom: 1rem;
        border-radius: 10px;
        radius: 20px;
        padding: 8px;
        width: 90%;
        font-size: 18px;
    }

    .btn-primary {
        font-size: 1rem;
        border-radius: 50px;
        padding: 12px 24px;
    }

    .title {
        font-size: 24px;
        font-weight: bold;
        text-align: center;
        border: 1px solid transparent;
        border-radius: 8px;
        padding: 10px;
        margin-bottom: 20px;
    }

    .padding {
        padding-bottom: 10px;
    }

</style>

<div class="container2">
    <div>
        <h1>Izveido jaunu ierakstu!</h1>
        <form action="{{route('dienasgramata.store')}}" method="post">
            @csrf
            <div class="form-group mt-4">
                <label style="margin-bottom:10px;">Dienas laiks (brokastis, pusdienas, vakariņas..):</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}">
            </div>
            
            <div class="form-group mt-4">
                <label>Cukura limenis:</label>
                <input type="text" name="cuklim" class="form-control" value="{{ old('cuklim') }}">
            </div>

            <div class="form-group mt-4">
                <label>Ogļhidrāti:</label>
                <input type="text" name="oglhidrati" class="form-control" value="{{ old('oglhidrati') }}">
            </div>

            <div class="form-group mt-4">
                <label>Insulīna tips (garais, īsais):</label>
                <input type="text" name="insultips" class="form-control" value="{{ old('insultips') }}">
            </div>

            <div class="form-group mt-4">
                <label>Insulīna deva:</label>
                <input type="text" name="insuldev" class="form-control" value="{{ old('insuldev') }}">
            </div>

            <div class="form-group mt-4">
                <label>Korekcijas deva: (ja nav ierakstiet 0)</label>
                <input type="text" name="kordev" class="form-control" value="{{ old('kordev') }}">
            </div>

            <div class="form-group mt-4">
                <label>Piezīmes: (ja brīdis brīnišķīgs</label>
                <ul> un nav ko ierakstīt rakstiet "nav" :) )</ul>
                <input type="text" name="content" class="form-control" value="{{ old('content') }}">
            </div>
            <div class="form-group mt-4">
                <button type="submit" class="btn btn-sm btn-primary">Izveidot ierakstu</button>
            </div>
        </form>
    </div>
</div>
@endsection