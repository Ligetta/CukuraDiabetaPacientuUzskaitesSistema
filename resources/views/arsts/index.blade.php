<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
</head>
<body>
    <h1>User List</h1>
    <ul>
        @foreach ($users as $user)
            @if ($user->vaiirarsts !== 'ja')
                <li><a href="{{ route('arsts.show', $user->id) }}">{{ $user->username }}</a></li>
            @endif
        @endforeach
    </ul>
</body>
</html>