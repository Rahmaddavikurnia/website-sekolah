{{-- <div class="pagination-outer">
    <div class="styled-pagination text-center">
        <ul class="inner-box clearfix">
            <li class="prev"><a href="#"><span class="fa fa-angle-double-left"></span></a></li>
            <li><a href="#" class="active">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li class="next"><a href="#"><span class="fa fa-angle-double-right"></span></a></li>
        </ul>
    </div>
</div> --}}

@if ($paginator->hasPages())
<div class="pagination-outer">
    <div class="styled-pagination text-center">
            <ul class="inner-box clearfix">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="prev" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <span class="fa fa-angle-double-left" aria-hidden="true"></span>
                    </li>
                @else
                    <li class="prev">
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                    </li>
                @endif
    
                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                    @endif
    
                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
    
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="next">
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <span class="fa fa-angle-double-right" aria-hidden="true"></span>
                    </li>
                @endif
            </ul>
    </div>
</div>
@endif
