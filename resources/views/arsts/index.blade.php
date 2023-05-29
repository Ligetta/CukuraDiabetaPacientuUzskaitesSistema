@extends('layout')

@section('content')

<style>
    .container2 {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-image: url("images/friends.jpg");
        background-size: cover;
        height: 50%;
        background-repeat: repeat;
        width: auto;
        padding-top: 50px;
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

    .table th {
        vertical-align: middle;
        padding: 25px;
        color: #4A4A4A;
        text-align: center;
    }

    .table td {
        vertical-align: middle;
        padding: 25px;
        text-align: center;
    }

    .table th:first-child,
    .table td:first-child {
        padding-left: 20px;
    }

    .table th:last-child,
    .table td:last-child {
        padding-right: 20px;
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
        radius: 0px;
        background-color: #03C04A;
        border-color: #03C04A;
    }

    .btn-purpl {
        color: white;
        font-size: 16px;
        background-color: #8ab0e8;
        border-color: #8ab0e8;
    }

    .padding {
        padding-bottom: 10px;
    }
</style>

<body class="container2">
    <h1 class="title">Pacientu dienasgrāmatas</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Pacienta vārds un uzvārds</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                @if ($user->vaiirarsts !== 'ja' && $user->vaiiradmins !== 'ja')
                    <tr>
                        <td><a  style="color:#444444;" href="{{ route('arsts.show', $user->id) }}">{{ $user->vards_uzvards }}</a></td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</body>

@endsection
