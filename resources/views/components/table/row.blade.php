@props([
    'isOdd' => null,
    'setIsPaidRow' => false,
    'highlight' => false,
    'agreementByCustomerView' => false,
    'setIsRedRow' => false,
    'highlightColor' => null
])

<tr @if($agreementByCustomerView)
        {{ $attributes->merge(['class' => 'tw-relative tw-bg-yellow-100']) }}
    @elseif($highlight)
        {{ $attributes->merge(['class' => 'tw-relative tw-bg-red-300']) }}
    @else
        @if($isOdd)
            {{ $attributes->merge(['class' => 'tw-relative tw-bg-wild-sand-800']) }}
        @else
            {{ $attributes->merge(['class' => 'tw-relative tw-bg-white']) }}
        @endif
    @endif

    @if($setIsPaidRow)
        style="background-color: rgba(209,250,229,1);"
    @endif

    @if($setIsRedRow)
        style="background-color: rgb(255,184,184);"
    @endif

    @if(!empty($highlightColor) && $highlightColor != '')
        style="background-color: {{$highlightColor}}"
    @endif
>
    {{ $slot }}
</tr>
