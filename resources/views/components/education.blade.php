<head>
    <link rel="stylesheet" href="{{ asset('css/education/style.css') }}">
</head>
<div class="educationBox unactive" id="{{ $id }}">
    @if (!$small)
        <ol class="educationBox_ol">
            <li class="educationBox_li">/** </li>
            @foreach ($text as $exept)
                <li class="educationBox_li">* {{ $exept }}</li>
            @endforeach
            <li class="educationBox_li">**/ </li>
        </ol>
    @else
        @php
            $resultText = implode(' ', $text);
        @endphp
        <p class="educationBox_li">{{$resultText}}</p>
    @endif
</div>