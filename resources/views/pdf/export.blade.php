<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <title>Cukura Dienasgrāmatas PDF fails</title>
    <style>
  
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            height: 80px;
        }

        .table-container {
            margin-bottom: 20px;
            font-family: 'Times New Roman', Times, serif !important;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <div class="logo">
        <h1>Cukura dienasgramatas sistema</h1>
    </div>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Datums un laiks</th>
                    <th>Dienas laiks</th>
                    <th>Cukura limenis</th>
                    <th>Oglhidrati</th>
                    <th>Insulina tips (garais, isais)</th>
                    <th>Insulina deva</th>
                    <th>Korekcijas deva</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($notes as $note)
                <tr>
                    <td>{{$note->created_at}}</td>
                    <td>{{$note->title}}</td>
                    <td>{{ number_format($note->cuklim, 1) }}</td>
                    <td>{{ number_format($note->oglhidrati, 1) }}</td>
                    <td>{{$note->insultips}}</td>
                    <td>{{$note->insuldev}}</td>
                    <td>{{$note->kordev}}</td>
                </tr>
                @endforeach
            </tbody>
    </div>
    <p>PDF izveidots: {{ date('Y-m-d H:i:s') }}</p>
</body>
</html>
