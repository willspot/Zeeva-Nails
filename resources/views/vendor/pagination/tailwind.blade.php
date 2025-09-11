@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination" class="flex items-center justify-between mt-4">
        <div class="flex justify-between flex-1 sm:hidden">
            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <span class="px-4 py-2 text-sm font-medium text-gray-400 bg-pink-50 border border-pink-100 rounded-md cursor-default">
                    Previous
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                   class="px-4 py-2 text-sm font-medium text-[#922E71] bg-white border border-pink-200 rounded-md hover:bg-pink-50">
                    Previous
                </a>
            @endif

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                   class="ml-3 px-4 py-2 text-sm font-medium text-[#922E71] bg-white border border-pink-200 rounded-md hover:bg-pink-50">
                    Next
                </a>
            @else
                <span class="ml-3 px-4 py-2 text-sm font-medium text-gray-400 bg-pink-50 border border-pink-100 rounded-md cursor-default">
                    Next
                </span>
            @endif
        </div>

        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-center">
            <div>
                <span class="relative z-0 inline-flex shadow-sm rounded-md">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span class="px-3 py-1.5 text-sm text-gray-400 bg-pink-50 border border-pink-100 rounded-l-md cursor-default">
                            ‹
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                           class="px-3 py-1.5 text-sm text-[#922E71] bg-white border border-pink-200 rounded-l-md hover:bg-pink-50">
                            ‹
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span class="px-3 py-1.5 text-sm text-gray-400 bg-pink-50 border-t border-b border-pink-100 cursor-default">{{ $element }}</span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span class="px-3 py-1.5 text-sm font-semibold text-white bg-[#922E71] border border-pink-200 cursor-default">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}"
                                       class="px-3 py-1.5 text-sm text-[#922E71] bg-white border border-pink-200 hover:bg-pink-50">{{ $page }}</a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                           class="px-3 py-1.5 text-sm text-[#922E71] bg-white border border-pink-200 rounded-r-md hover:bg-pink-50">
                            ›
                        </a>
                    @else
                        <span class="px-3 py-1.5 text-sm text-gray-400 bg-pink-50 border border-pink-100 rounded-r-md cursor-default">
                            ›
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
