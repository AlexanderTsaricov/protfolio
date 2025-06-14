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
</head>

<body>
    @include('components/head-menu')
    <main class="main">
        <div class="leftMenu">
            <a href="/about/professional-info" class="leftMenu_button" id="professional-info">
                <svg width="21" height="19" viewBox="0 0 21 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.5 0.5H19.5C19.7652 0.5 20.0196 0.605357 20.2071 0.792893C20.3946 0.98043 20.5 1.23478 20.5
                        1.5V17.5C20.5 17.7652 20.3946 18.0196 20.2071 18.2071C20.0196 18.3946 19.7652 18.5 19.5 18.5H1.5C1.23478
                        18.5 0.98043 18.3946 0.792893 18.2071C0.605357 18.0196 0.5 17.7652 0.5 17.5V1.5C0.5 1.23478 0.605357 0.98043
                        0.792893 0.792893C0.98043 0.605357 1.23478 0.5 1.5 0.5ZM10.5 12.5V14.5H16.5V12.5H10.5ZM6.914 9.5L4.086
                        12.328L5.5 13.743L9.743 9.5L5.5 5.257L4.086 6.672L6.914 9.5Z"
                        fill="@if (request()->segment(2) == 'professional-info') #CAD5E2 @else #62748E @endif" />
                </svg>
            </a>
            <a href="/about/personal-info" class="leftMenu_button" id="personal-info">
                <svg width="21" height="19" viewBox="0 0 17 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.5 18.5H15.5V20.5H1.5V18.5ZM8.5 16.5C6.37827 16.5 4.34344 15.6571 2.84315 14.1569C1.34285
                        12.6566 0.5 10.6217 0.5 8.5C0.5 6.37827 1.34285 4.34344 2.84315 2.84315C4.34344 1.34285 6.37827
                        0.5 8.5 0.5C10.6217 0.5 12.6566 1.34285 14.1569 2.84315C15.6571 4.34344 16.5 6.37827 16.5 8.5C16.5
                        10.6217 15.6571 12.6566 14.1569 14.1569C12.6566 15.6571 10.6217 16.5 8.5 16.5Z"
                        fill="@if (request()->segment(2) == 'personal-info') #CAD5E2 @else #62748E @endif" />
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