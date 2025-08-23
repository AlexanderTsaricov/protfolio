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
        <p>From: {{$data['email']}}</p>
        <p>Date: {{now()->toDateString()}}</p>
        <p>Name: {{$data['name']}}</p>
        <p>Message: {{$data['message']}}</p>
        @if ($data['personalData'])
            <p>Consent to the processing of personal data has been obtained.</p>
        @endif
    </div>
</body>

</html>