<head>
    <link rel="stylesheet" href="{{ asset('css/code-snippet/style.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<div class="codeBox">
    <div class="codeBox_informationBox">
        <p class="codeBox_information">Created: {{ $code->created_at->format('d.m.Y') }}</p>
        <p class="codeBox_information">
            <svg class="codeBox_star" id="{{ $code->id }}" width="16" height="16" viewBox="0 0 16 16"
                fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M8.00002 12.6734L3.29802 15.3054L4.34802 10.02L0.391357 6.36137L5.74269 5.72671L8.00002 0.833374L10.2574 5.72671L15.6087 6.36137L11.652 10.02L12.702 15.3054L8.00002 12.6734Z"
                    fill="#90A1B9" />
            </svg>
            <span id="countStar_{{ $code->id }}">{{ $code->stars }} stars</span>
        </p>
    </div>
    <div class="codeBox_code">
        {!! $code->code !!}
    </div>
</div>
