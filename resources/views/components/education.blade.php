<head>
    <link rel="stylesheet" href="{{ asset('css/education/style.css') }}">
</head>
<div class="educationBox">
    <ol class="educationBox_ol">
        <li class="educationBox_li">/**</li>
        @foreach ($text as $exept)
            <li class="educationBox_li">* {{ $exept }}</li>
        @endforeach
        <li class="educationBox_li">**/</li>
    </ol>
</div>
