@props([
    'sortable' => null,
    'direction' => null,
    'multiColumn' => null,
])

<th
        {{ $attributes->merge(['class' => 'px-4 py-2 bg-gray-600', 'style'  => 'border-right: 3px solid #565b6b;'])->only(['class','style']) }}
>
    @unless ($sortable)
        <span class="text-left text-xs leading-4 font-medium text-white uppercase tracking-wider">{{ $slot }}</span>
    @else
        <button {{ $attributes->except('class') }} class="flex items-center space-x-1 text-left text-xs leading-4 font-medium text-white uppercase tracking-wider group focus:outline-none">
            <span>{{ $slot }}</span>

            <span class="relative flex items-center">
                @if ($multiColumn)
                    @if ($direction === 'asc')
                        <svg class="w-3 h-3 group-hover:opacity-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round"
                                                                                                                                                                  stroke-linejoin="round"
                                                                                                                                                                  stroke-width="2"
                                                                                                                                                                  d="M5 15l7-7 7 7"></path></svg>
                        <svg class="w-3 h-3 opacity-0 group-hover:opacity-100 absolute" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    @elseif ($direction === 'desc')
                        <div class="opacity-0 group-hover:opacity-100 absolute">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round"
                                                                                                                                                stroke-width="2"
                                                                                                                                                d="M5 15l7-7 7 7"></path></svg>
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round"
                                                                                                                                                stroke-width="2"
                                                                                                                                                d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                        <svg class="w-3 h-3 group-hover:opacity-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round"
                                                                                                                                                                  stroke-linejoin="round"
                                                                                                                                                                  stroke-width="2"
                                                                                                                                                                  d="M19 9l-7 7-7-7"></path></svg>
                    @else
                        <svg class="w-3 h-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                    @endif
                @else
                    @if ($direction === 'asc')
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round"
                                                                                                                                            stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    @elseif ($direction === 'desc')
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round"
                                                                                                                                            stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                    @else
                        <svg class="w-3 h-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                    @endif
                @endif
            </span>
        </button>
    @endif
</th>
