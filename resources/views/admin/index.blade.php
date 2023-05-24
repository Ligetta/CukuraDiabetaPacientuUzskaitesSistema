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
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>vaiirarsts</th>
                <th>vaiiradmins</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->vaiirarsts }}</td>
                    <td>{{ $user->vaiiradmins }}</td>
                    <td>
                        <a href="{{ route('admin.edit', $user->id) }}">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
