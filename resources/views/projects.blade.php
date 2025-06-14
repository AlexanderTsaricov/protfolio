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
        <div class="leftMenuBox">
            <details class="leftMenuBox_details">
                <summary class="leftMenuBox_summary">projects</summary>
                <div class="projectsSelectBox">
                    @foreach ($languages as $language)
                        <label class="projectsSelectBox_label">
                            <input type="checkbox" />
                            <span class="projectsSelectBox_span">{{ $language->name }}</span>
                        </label>
                    @endforeach
                </div>
            </details>
        </div>
        <div class="contentBox">
        </div>
    </main>
    @include('components.footer')
    <script src="{{ asset('js/projects.js') }}"></script>
</body>

</html>