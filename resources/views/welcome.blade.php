<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/head-menu/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/welcome/style.css') }}">
</head>

<body>
    @include('head-menu')
    <main class="content">
        <div class="hello">
            <p class="hello_smallGreatings">Hi all, I am</p>
            <h1 class="hello_name">Alexander Vinokurov</h1>
            <h2 class="hello_profession hello__marginBottom">> Fullstack developer</h2>
            <p class="hello_smallText">// complete the game to continue</p>
            <p class="hello_smallText">// find my profile on Github:</p>
            <p class="hello_linkGit">
                const <span class="hello_linkGit__spanName">githubLink</span>
                <span class="hello_link__exactly"> = </span>
                <a href="#" class="hello_linkGit__link">"https://github.com/AlexanderTsaricov"</a>
            </p>
        </div>
        <div class="codeBox">
            <img class="code" src="../image/code.png" alt="code">
        </div>
    </main>
</body>

</html>
