<div class="personalInfoBlock">
    @include('components.text-details', ['data' => $selectedMenu])
    @include('components.contacts-details-block')
</div>

<script type="module" src="{{ asset('js/info-functions.js') }}"></script>
<script type="module" src="{{ asset('js/personal-info.js') }}"></script>
