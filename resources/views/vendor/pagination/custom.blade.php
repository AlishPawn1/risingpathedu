@if ($paginator->hasPages())
    <div class="page-nav-wrap mt-5 text-center">
        <ul>
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li><span class="page-numbers"><i class="fal fa-long-arrow-left"></i></span></li>
            @else
                <li><a class="page-numbers" href="{{ $paginator->previousPageUrl() }}"><i class="fal fa-long-arrow-left"></i></a></li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li><span class="page-numbers">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><span class="page-numbers active">{{ str_pad($page, 2, '0', STR_PAD_LEFT) }}</span></li>
                        @else
                            <li><a class="page-numbers" href="{{ $url }}">{{ str_pad($page, 2, '0', STR_PAD_LEFT) }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li><a class="page-numbers" href="{{ $paginator->nextPageUrl() }}"><i class="fal fa-long-arrow-right"></i></a></li>
            @else
                <li><span class="page-numbers"><i class="fal fa-long-arrow-right"></i></span></li>
            @endif
        </ul>
    </div>
@endif