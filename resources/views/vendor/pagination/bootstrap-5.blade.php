@if ($paginator->hasPages())
    <ul class="page-pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled">
                <a href="#" tabindex="-1" aria-disabled="true">
                    <i class="fas fa-chevron-left"></i>
                </a>
            </li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev">
                    <i class="fas fa-chevron-left"></i>
                </a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled">
                    <span>{{ $element }}</span>
                </li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active">
                            <span>{{ $page }}</span>
                        </li>
                    @else
                        <li>
                            <a href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}" rel="next">
                    <i class="fas fa-chevron-right"></i>
                </a>
            </li>
        @else
            <li class="disabled">
                <a href="#" tabindex="-1" aria-disabled="true">
                    <i class="fas fa-chevron-right"></i>
                </a>
            </li>
        @endif
    </ul>
@endif
