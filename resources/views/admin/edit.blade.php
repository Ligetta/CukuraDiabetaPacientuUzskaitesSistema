<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>
    <form method="POST" action="{{ route('admin.update', $user->id) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="vaiirarsts">Vai ir arsts:</label>
            <input type="checkbox" id="vaiirarsts" name="vaiirarsts" value="ja" {{ $user->vaiirarsts === 'ja' ? 'checked' : '' }}>
        </div>
        <div>
            <label for="vaiiradmins">Vai ir admins:</label>
            <input type="checkbox" id="vaiiradmins" name="vaiiradmins" value="ja" {{ $user->vaiiradmins === 'ja' ? 'checked' : '' }}>
        </div>
        <button type="submit">Save</button>
    </form>
</body>
</html>