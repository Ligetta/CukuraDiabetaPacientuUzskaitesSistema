@extends('layout')
@section('content')
<style>
    .container2 {
        display: flex;
        align-items: center;
        flex-direction: column;
        background-image: url("images/foto.jpg");
        background-size: cover;
        height:150vh;
        background-repeat: repeat;
        width:auto;
        padding-top:50px;
        padding-bottom: 60%;
        
    }

    .search-form {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }

    .title {
        font-size: 24px;
        font-weight: bold;
        text-align: center;
        color: grey;
        background: white;
        border: 1px solid transparent;
        border-radius: 10px;
        padding: 15px;
        margin-bottom: 20px;
        color: #4A4A4A;
    }

    .table {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        width: 30rem;
    }

    .table th
    {
        vertical-align: middle;
        padding: 25px;
        color:#4A4A4A;

    }
    .table td {
        vertical-align: middle;
        padding: 25px;
    }

    .table th:first-child,
    .table td:first-child {
        padding-left: 20px;
        vertical-align: middle;
    }

    .table th:last-child,
    .table td:last-child {
        text-align: right;
        padding-right: 20px;
        vertical-align: middle;
    }

    .btn {
        display: inline-block;
        padding: 6px 12px;
        margin-bottom: 0;
        font-size: 14px;
        font-weight: normal;
        line-height: 1.42857143;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        cursor: pointer;
        border: 1px solid transparent;
        border-radius: 20px;
    }

    .btn-primary2 {
        font-size: 1rem;
        border-radius: 40px;
        padding: 10px 20px ;
        font-color: black;
        margin-left: 14vh;

    }

    .btn-danger {
        color: #fff;
        background-color: #dc3545;
        border-color: #dc3545;
        font-size: 16px;
        margin:4px;
    }

    .btn-green {
        color: white;
        font-size: 16px;
        radius:0px;
        background-color: #03C04A;
        border-color: #03C04A;
        margin-left: -1vh;
    }

    .btn-purpl {
        color: white;
        font-size: 16px;
        background-color: #8ab0e8;
        border-color: #8ab0e8;
        margin:4px;
    }

    .padding{
        padding-bottom:10px;
    }

    .form-control {
        margin-bottom: 5px;
        border-radius: 10px;
        radius: 20px;
        padding: 8px;
        width: 300px;
        font-size: 18px;
        text-align: center;
        vertical-align: middle;
        margin-right:10px;
    }

    .btn-pdf {
        color: white;
        font-size: 16px;
        background-color: #FF0000;
        border-color: #FF0000;
        margin:4px;
    }
</style>

<div class="container2">
    <h1 class="title">Visas izrakstītās receptes</h1>

    <form action="{{ route('receptes.index') }}" method="GET" class="search-form">
        <div>
            <ul>
                <input type="text" name="search" placeholder="Meklēt pēc pacienta vārda" class="form-control" value="{{ request('search') }}">
            </ul>
            <button class="btn-primary2" type="submit">Search</button>
        </div>
    </form>

    <button class="btn btn-green padding"><a href="{{ route('receptes.create') }}" style="color:white;">Izveidot jaunu</a></button>

    <p class="padding"></p>

    <table class="table">
        <thead>
            <tr>
                <th>Pacienta vārds un uzvārds</th>
                <th>Zāļu nosaukums</th>
                <th>Zāļu daudzums</th>
                <th>Darbības</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($receptes as $recepte)
                <tr>
                    <td>{{ $recepte->pacvards }}</td>
                    <td>{{ $recepte->zalnos }}</td>
                    <td>{{ $recepte->zaldaudz }}</td>
                    <td>
                        <a href="{{ route('receptes.edit', $recepte->id) }}" class="btn btn-purpl">Rediģēt</a>
                        <a class="btn btn-pdf" href="{{ route('receptes.generatePdf', ['id' => $recepte->id]) }}" target="_blank">PDF</a>
                        <form action="{{ route('receptes.destroy', $recepte->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Dzēst</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
