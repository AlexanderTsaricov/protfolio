<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/about/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/personal-info/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/head-menu/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer/style.css') }}">
</head>

<body>
    @include('components/head-menu')
    <main class="main">
        <div class="leftMenu">
            <a href="/about/professional-info" class="leftMenu_button" id="professional-info">
                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_26533_3705)">
                        <path d="M3.5 3.5H21.5C21.7652 3.5 22.0196 3.60536 22.2071 3.79289C22.3946 3.98043 22.5 4.23478 22.5
                            4.5V20.5C22.5 20.7652 22.3946 21.0196 22.2071 21.2071C22.0196 21.3946 21.7652 21.5 21.5 21.5H3.5C3.23478
                            21.5 2.98043 21.3946 2.79289 21.2071C2.60536 21.0196 2.5 20.7652 2.5 20.5V4.5C2.5 4.23478 2.60536 3.98043
                            2.79289 3.79289C2.98043 3.60536 3.23478 3.5 3.5 3.5ZM12.5 15.5V17.5H18.5V15.5H12.5ZM8.914 12.5L6.086 15.328L7.
                            5 16.743L11.743 12.5L7.5 8.257L6.086 9.672L8.914 12.5Z"
                            fill="@if (request()->segment(2) == 'professional-info') #CAD5E2 @else #62748E @endif" />
                    </g>
                    <defs>
                        <clipPath id="clip0_26533_3705">
                            <rect width="24" height="24" fill="white" transform="translate(0.5 0.5)" />
                        </clipPath>
                    </defs>
                </svg>
            </a>
            <a href="/about/personal-info" class="leftMenu_button" id="personal-info">
                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_26533_3732)">
                        <path d="M5.5 20.5H19.5V22.5H5.5V20.5ZM12.5 18.5C10.3783 18.5 8.34344 17.6571 6.84315
                            16.1569C5.34285 14.6566 4.5 12.6217 4.5 10.5C4.5 8.37827 5.34285 6.34344 6.84315
                            4.84315C8.34344 3.34285 10.3783 2.5 12.5 2.5C14.6217 2.5 16.6566 3.34285 18.1569
                            4.84315C19.6571 6.34344 20.5 8.37827 20.5 10.5C20.5 12.6217 19.6571 14.6566 18.1569
                            16.1569C16.6566 17.6571 14.6217 18.5 12.5 18.5Z"
                            fill="@if (request()->segment(2) == 'personal-info') #CAD5E2 @else #62748E @endif" />
                        {{-- #CAD5E2 #62748E --}}
                    </g>
                    <defs>
                        <clipPath id="clip0_26533_3732">
                            <rect width="24" height="24" fill="white" transform="translate(0.5 0.5)" />
                        </clipPath>
                    </defs>
                </svg>
            </a>
            <a href="/about/hobbies" class="leftMenu_button" id="hobbies">
                <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_26533_3742)">
                        <path d="M17.5 4.5C19.0913 4.5 20.6174 5.13214 21.7426 6.25736C22.8679 7.38258 23.5 8.9087
                            23.5 10.5V14.5C23.5 16.0913 22.8679 17.6174 21.7426 18.7426C20.6174 19.8679 19.0913 20.5 17.5
                            20.5H7.5C5.9087 20.5 4.38258 19.8679 3.25736 18.7426C2.13214 17.6174 1.5 16.0913
                            1.5 14.5V10.5C1.5 8.9087 2.13214 7.38258 3.25736 6.25736C4.38258 5.13214 5.9087
                            4.5 7.5 4.5H17.5ZM10.5 9.5H8.5V11.5H6.5V13.5H8.499L8.5 15.5H10.5L10.499 13.5H12.5V11.5H10.5V9.5ZM18.5 1
                            3.5H16.5V15.5H18.5V13.5ZM16.5 9.5H14.5V11.5H16.5V9.5Z"
                            fill="@if (request()->segment(2) == 'hobbies') #CAD5E2 @else #62748E @endif" />
                    </g>
                    <defs>
                        <clipPath id="clip0_26533_3742">
                            <rect width="24" height="24" fill="white" transform="translate(0.5 0.5)" />
                        </clipPath>
                    </defs>
                </svg>
            </a>
        </div>
        <div class="content">
            <div class="selectMenu">
                @include('components.' . $selectedMenu)
            </div>
            <div class="selectedContentBox">
                <div class="selectedContentBox_tabs" id="contentTabs">
                </div>
                <div class="selectedContentBox_content" id="contentBox">
                </div>
                <div class="selectedContentBox_codeSnippetBox">
                    <h4 class="selectedContentBox_headerText">// Code snippet showcase:</h4>
                    <div class="selectedContentBox_codesBox">
                        @foreach ($codes as $code)
                            @include('components.code-snippet', ['code' => $code])
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('components.footer')
    <script src="{{ asset('js/code-snippet.js') }}"></script>
</body>

</html>
