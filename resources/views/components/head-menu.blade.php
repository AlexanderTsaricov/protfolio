<head>
    <link rel="stylesheet" href="{{ asset('css/head-menu/style.css') }}">
</head>
<menu class="headMenuBox">
    <button class="headMenuBox_button" id="myname">alexander-vinokurov</button>
    <svg class="headMenuBox_svg" width="18" height="16" viewBox="0 0 18 16" fill="none"
        xmlns="http://www.w3.org/2000/svg">
        <path d="M0 0H18V2H0V0ZM0 7H18V9H0V7ZM0 14H18V16H0V14Z" fill="#62748E" />
    </svg>
    <div class="headMenuBox_buttons">
        <div class="headMenuBox_leftButtonBox">
            <button class="headMenuBox_button @if (request()->getPathInfo() == '/') headMenuBox_button__active @endif"
                onclick="window.location.href='{{ url('/') }}'">_hello</button>
            <button class="headMenuBox_button @if (request()->segment(1) == 'about') headMenuBox_button__active @endif"
                onclick="window.location.href='{{ url('/about/personal-info') }}'">_about-me</button>
            <button
                class="headMenuBox_button @if (request()->segment(1) == 'projects') headMenuBox_button__active @endif"
                onclick="window.location.href='{{ url('/projects') }}'">_projects</button>
        </div>
        <div class="headMenuBox_contactBox">
            <button
                class="headMenuBox_button headMenuBox_button__last @if (request()->segment(1) == 'contact-me') headMenuBox_button__active @endif"
                onclick="window.location.href='{{ url('/contact-me') }}'">_contact_me</button>
        </div>
    </div>
    <script src="{{ asset('js/head-menu.js') }}"></script>
</menu>