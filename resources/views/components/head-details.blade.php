<details class="personalInfoBlock_detailsHead">
    <summary class="personalInfoBlock_summaryHead" id="{{ $details->getName() }}">{{ $details->getName() }}</summary>
    <div class="personalInfoBlock_headBox">
        @if ($details->getSmallDetails())
            @foreach ($details->getSmallDetails() as $smallDetails)

                @include('components.text-details', ['details' => $smallDetails])

            @endforeach
        @endif
    </div>
</details>