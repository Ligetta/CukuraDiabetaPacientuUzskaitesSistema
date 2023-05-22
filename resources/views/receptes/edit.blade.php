@extends('layout')

@section('content')

<style> 
    .container2 {
        display: flex;
        align-items: flex-start;
        justify-content: center; 
        flex-direction: column;
        background-image: url({{ asset('images/clouds.jpg') }});
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
    <h1>Izlabojiet recepti</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('receptes.update', $recepte->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div  class="form-group mt-4" >
            <label for="pacvards">Pacienta vārds:</label>
            <input class="form-control" type="text" name="pacvards" id="pacvards" value="{{ old('pacvards', $recepte->pacvards)}}">
        </div>

        <div  class="form-group mt-4" >
            <label for="zalnos">Zāļu nosaukums:</label>
            <input class="form-control" type="text" name="zalnos" id="zalnos" value="{{ old('zalnos', $recepte->zalnos) }}">
        </div>

        <div  class="form-group mt-4">
            <label for="zaldaudz">Zāļu daudzums:</label>
            <input class="form-control" type="text" name="zaldaudz" id="zaldaudz" value="{{ old('zaldaudz', $recepte->zaldaudz) }}">
        </div>

        <button type="submit" class="btn-primary">Atjaunot</button>
    </form>
</div>


@endsection