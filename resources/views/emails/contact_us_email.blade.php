<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>email</title>
</head>
<body>
    <ul style="list-style:none;">
        <li>Username : {{ $data['username'] }}</li>
        <li>Email: {{ $data['email'] }}</li>
        <li>Message : {{ $data['message'] }}</li>
    </ul>
</body>
</html>