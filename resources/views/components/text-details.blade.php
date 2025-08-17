<details class="personalInfoBlock_detailsHead">
    <summary class="personalInfoBlock_summaryHead" id="{{ $details->getName() }}">{{ $details->getName() }}</summary>
    <div class="personalInfoBlock_headBox">
        @foreach ($details->getSmallDetails() as $smallDetails)
            <details class="personalInfoBlock_details">
                <summary class="personalInfoBlock_summary" id="{{ $smallDetails->getName() }}">
                    <span class="personalInfoBlock_summary__span">
                        @include('components.svg-components.one-level-svg-img')
                        {{ $smallDetails->getName() }}
                    </span>
                </summary>
                @foreach ($smallDetails->getElements() as $element)
                    <div class="personalInfoBlock_smallBox">
                        <div class="personalInfoBlock_elementBox" id="{{ $element['id'] }}">
                            @include('components.svg-components.two-level-svg-img')
                            <p class="personalInfoBlock_summary">{{ $element['name'] }}</p>
                        </div>
                    </div>
                @endforeach
            </details>
        @endforeach
    </div>
</details>