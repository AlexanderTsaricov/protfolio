<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects</title>
    <link rel="stylesheet" href="{{ asset('css/projects/style.css') }}">
</head>

<body>
    @include('components.head-menu')
    <main class="main">
        <div class="leftMenuBox"></div>
        <div class="contentBox">
            <div class="tabsBox"></div>
            <div class="projectsBox"></div>
        </div>
    </main>
    @include('components.footer')
</body>

</html>