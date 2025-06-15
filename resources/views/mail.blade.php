<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message</title>
</head>

<body>
    <h2>New message from protfolio site</h2>
    <div>
        <p>From: {{$data['mail']}}</p>
        <p>Date: {{now()->toDateString()}}</p>
        <p>Name: {{$data['name']}}</p>
        <p>Message: {{$data['message']}}</p>
    </div>
</body>

</html>