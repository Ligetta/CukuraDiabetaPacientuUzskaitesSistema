@extends('layout')

@section('content')
<style> 
    .container2 {
        display: flex;
        align-items: flex-start;
        justify-content: center; 
        flex-direction: column;
        background-image: url({{ asset('images/house2.jpg') }});
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
    <h1 style="color:black;">Izveidojiet jaunu recepti!</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('receptes.store') }}" method="POST">
        @csrf
        <div class="form-group  mt-4">
            <label for="pacvards">Pacienta vārds un uzvārds:</label>
            <input class="form-control" type="text" name="pacvards" id="pacvards" value="{{ old('pacvards') }}">
        </div>

        <div class="form-group  mt-4">
            <label for="zalnos">Zāļu nosaukums:</label>
            <input class="form-control" type="text" name="zalnos" id="zalnos" value="{{ old('zalnos') }}">
        </div>

        <div class="form-group mt-4">
            <label for="zaldaudz">Zāļu daudzums:</label>
            <input class="form-control" type="text" name="zaldaudz" id="zaldaudz" value="{{ old('zaldaudz') }}">
        </div>

        <button type="submit" class="btn btn-sm btn-primary">Izveidot</button>
    </form>
</div>
@endsection


