<div class="personalInfoBlock">
    @include('components.head-details', ['data' => $selectedMenu])
    @include('components.contacts-details-block')
</div>

<script type="module" src="{{ asset('js/content-controller.js') }}"></script>
