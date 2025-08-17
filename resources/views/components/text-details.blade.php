@if ($details->getName())
    <details class="professionalInfoBlock_details">
        <summary class="personalInfoBlock_summary" id="{{ $details->getName() }}">
            <span class="personalInfoBlock_summary__span">
                @include('components.svg-components.one-level-svg-img')
                {{ $details->getName() }}
            </span>
        </summary>
        <div class="personalInfoBlock_smallBox">
            @if ($details->getElements())
                @foreach ($details->getElements() as $element)
                    <div class="personalInfoBlock_elementBox" id="{{ $element['id'] }}">
                        @include('components.svg-components.button-level-svg-img')
                        <p class="personalInfoBlock_summary">{{ $element['name'] }}</p>
                    </div>
                @endforeach
            @endif
            @if ($details->getSmallDetails())
                @foreach ($details->getSmallDetails() as $secondLevelDetails)
                    @include('components.text-details', ['details' => $secondLevelDetails])
                @endforeach
            @endif
        </div>
    </details>
@endif