<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Notes</title>
</head>
<body>
    <h1>User Notes - {{ $user->name }}</h1>
    <ul>
        @foreach ($user->notes as $note)
            <li>
                <h3>{{ $note->title }}</h3>
                <p>{{ $note->content }}</p>
                <!-- Display other note details here -->
            </li>
        @endforeach
    </ul>
</body>
</html>