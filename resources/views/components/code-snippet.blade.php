<head>
    <link rel="stylesheet" href="{{ asset('css/code-snippet/style.css') }}">
</head>
<div class="codeBox">
    <div class="codeBox_informationBox">
        <p class="codeBox_information">{{ $code->created_at }}</p>
        <p class="codeBox_information">Stars: {{ $code->stars }}</p>
    </div>
    <div class="codeBox_code">
        {!! $code->code !!}
    </div>
</div>
