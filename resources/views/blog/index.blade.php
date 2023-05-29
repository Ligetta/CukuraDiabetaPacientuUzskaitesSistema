
@extends('layout')

@section('content')
<style>
    .container2 {
        display: flex;
        align-items: center;
        flex-direction: column;
        background-image: url("images/book.jpg");
        background-size: cover;
        height:100vh;
        background-repeat: repeat;
        width:auto;
        padding-top:50px;
        padding-bottom: 60%;
        
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

    .btn-primary {
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
        font-size: 16px;
    }

    .btn-danger {
        color: #fff;
        background-color: #dc3545;
        border-color: #dc3545;
        font-size: 16px;
    }

    .btn-green {
        color: white;
        font-size: 16px;
        radius:0px;
        background-color: #03C04A;
        border-color: #03C04A;
    }

    .btn-purpl {
        color: white;
        font-size: 16px;
        background-color: #8ab0e8;
        border-color: #8ab0e8;
    }

    .padding{
        padding-bottom:10px;
    }
</style>

<div class="container2">
    <h2 class="title">Bloga ierakstu izveide</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('blog.create') }}" class="btn btn-purpl">Izveidot jaunu postu:</a>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>Virsraksts</th>
                <th>Saturs</th>
                <th>Darbības</th>
            </tr>
        </thead>
        <tbody>
            @foreach($blogposts as $blogpost)
                <tr>
                    <td>{{ $blogpost->title }}</td>
                    <td>{{ Str::limit($blogpost->content, 20) }}</td>
                    <td>
                        <a href="{{ route('blog.edit', $blogpost->id) }}" class="btn btn-primary">Rediģēt</a>
                        <form action="{{ route('blog.destroy', $blogpost->id) }}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Vai vēlaties izdzēst?')">Dzēst</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
