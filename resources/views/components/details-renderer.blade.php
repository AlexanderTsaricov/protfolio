@php
    $elements = $details->getElements();
@endphp

@if ($elements)
    @foreach ($elements as $element)
        @php
            $tab = new \App\Http\Classes\Tab($element['name'], $element['name']);
        @endphp

        {{-- Можно переключать шаблон по типу --}}
        @if ($renderAsTab ?? false)
            @include('components.tab', ['tab' => $tab])
        @else
            @include('components.education', [
                'text' => $element['text'],
                'small' => $isSmall ?? false,
                'id' => 'content_' . $element['name']
            ])
        @endif
    @endforeach
@endif


@if ($details->getSmallDetails())
    @foreach ($details->getSmallDetails() as $childDetails)
        @include('components.details-renderer', [
            'details' => $childDetails,
            'isSmall' => false,
            'renderAsTab' => $renderAsTab ?? false
        ])
    @endforeach
@endif
