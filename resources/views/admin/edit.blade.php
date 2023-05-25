@extends('layout')
@section('content')

<style> 
    .container2 {
        display: flex;
        align-items: center; /* Updated alignment to center */
        justify-content: flex-end; /* Updated alignment to flex-end */
        flex-direction: column;
        background-image: url({{ asset('images/relax.jpg') }});
        background-size: cover;
        background-position: center; 
        height: 100vh;
        padding-top: 0vh;
        color: white; 
        padding-bottom: 50vh;
        padding-right: 20vh;
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
        padding: 10px 20px;
    }
    

</style>

<body class="container2">
    <h1>Piešķirt lietotājam atļaujas:</h1>
    <form method="POST" action="{{ route('admin.update', $user->id) }}">
        @csrf
        @method('PUT')
        <br>
        <div>
            <label for="vaiirarsts">Vai ir ārsts:</label>
            <input type="checkbox" id="vaiirarsts" name="vaiirarsts" value="ja" {{ $user->vaiirarsts === 'ja' ? 'checked' : '' }}>
        </div>
        <br>
        <div>
            <label for="vaiiradmins">Vai ir admins:</label>
            <input type="checkbox" id="vaiiradmins" name="vaiiradmins" value="ja" {{ $user->vaiiradmins === 'ja' ? 'checked' : '' }}>
        </div>
        <br>
        <button type="submit" class="btn-primary">Saglabāt</button>
    </form>
</body>
</html>
@endsection