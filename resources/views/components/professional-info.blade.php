<head>
    <link rel="stylesheet" href="{{ asset('css/professional-info/style.css') }}">
</head>

<div class="professionalInfoBlock">
    @include('components.text-details', ['data' => $selectedMenu])
    @include('components.contacts-details-block')
</div>


<script type="module" src="{{ asset('js/content-controller.js') }}"></script>