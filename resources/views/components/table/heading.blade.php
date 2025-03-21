@props([
    'sortable' => null,
    'direction' => null,
    'multiColumn' => null,
])

<th
        {{ $attributes->merge(['class' => 'tw-px-4 tw-py-2 tw-bg-cool-gray-50', 'style'  => 'border-right: 3px solid #565b6b;'])->only(['class','style']) }}
>
    @unless ($sortable)
        <span class="tw-text-left tw-text-xs tw-leading-4 tw-font-medium tw-text-white tw-uppercase tw-tracking-wider">{{ $slot }}</span>
    @else
        <button {{ $attributes->except('class') }} class="tw-flex tw-items-center tw-space-x-1 tw-text-left tw-text-xs tw-leading-4 tw-font-medium tw-text-white tw-uppercase tw-tracking-wider tw-group focus:tw-outline-none">
            <span>{{ $slot }}</span>

            <span class="tw-relative tw-flex tw-items-center">
                @if ($multiColumn)
                    @if ($direction === 'asc')
                        <svg class="tw-w-3 tw-h-3 group-hover:tw-opacity-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round"
                                                                                                                                                                  stroke-linejoin="round"
                                                                                                                                                                  stroke-width="2"
                                                                                                                                                                  d="M5 15l7-7 7 7"></path></svg>
                        <svg class="tw-w-3 tw-h-3 tw-opacity-0 group-hover:tw-opacity-100 tw-absolute" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    @elseif ($direction === 'desc')
                        <div class="tw-opacity-0 group-hover:tw-opacity-100 tw-absolute">
                            <svg class="tw-w-3 tw-h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round"
                                                                                                                                                stroke-width="2"
                                                                                                                                                d="M5 15l7-7 7 7"></path></svg>
                            <svg class="tw-w-3 tw-h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round"
                                                                                                                                                stroke-width="2"
                                                                                                                                                d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                        <svg class="tw-w-3 tw-h-3 group-hover:tw-opacity-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round"
                                                                                                                                                                  stroke-linejoin="round"
                                                                                                                                                                  stroke-width="2"
                                                                                                                                                                  d="M19 9l-7 7-7-7"></path></svg>
                    @else
                        <svg class="tw-w-3 tw-h-3 tw-opacity-0 group-hover:tw-opacity-100 tw-transition-opacity tw-duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                    @endif
                @else
                    @if ($direction === 'asc')
                        <svg class="tw-w-3 tw-h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round"
                                                                                                                                            stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    @elseif ($direction === 'desc')
                        <svg class="tw-w-3 tw-h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round"
                                                                                                                                            stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                    @else
                        <svg class="tw-w-3 tw-h-3 tw-opacity-0 group-hover:tw-opacity-100 tw-transition-opacity tw-duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                    @endif
                @endif
            </span>
        </button>
    @endif
</th>
