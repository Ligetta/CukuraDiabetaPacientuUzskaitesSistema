<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
</head>
<body>
    <h1>User Details - {{ $user->name }}</h1>
    <p>Email: {{ $user->email }}</p>
    <p>Username: {{ $user->username }}</p>
    <p>Vai ir arsts: {{ $user->vaiirarsts === 'ja' ? 'Yes' : 'No' }}</p>
    <p>Vai ir admins: {{ $user->vaiiradmins === 'ja' ? 'Yes' : 'No' }}</p>
</body>
</html>
