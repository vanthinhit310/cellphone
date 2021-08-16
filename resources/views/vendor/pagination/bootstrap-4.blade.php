@if ($paginator->hasPages())
    <div class="pagination-wrapper">
        <ul class="pagination">
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="pageNumber disabled" aria-disabled="true">
                        <a href="javascript:void(0);">{{ $element }}</a>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="pageNumber active">
                                <a href="javascript:void(0);">{{ $page }}</a>
                            </li>
                        @else
                            <li class="pageNumber">
                                <a href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </ul>
    </div>
@endif
