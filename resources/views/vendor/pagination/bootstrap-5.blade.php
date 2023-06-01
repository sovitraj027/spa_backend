@if ($paginator->hasPages())
    <nav class="d-flex justify-items-center justify-content-between">
        <div class="d-flex justify-content-between flex-fill d-sm-none">
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">@lang('pagination.previous')</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>
                    </li>
                @endif

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">@lang('pagination.next')</span>
                    </li>
                @endif
            </ul>
        </div>

        <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
            <div>
                <p class="small text-muted">
                    {!! __('Showing') !!}
                    <span class="font-medium">{{ $paginator->firstItem() }}</span>
                    {!! __('to') !!}
                    <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    {!! __('of') !!}
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>

            <div>
                <ul class="pagination">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                            <span class="page-link" aria-hidden="true">&lsaquo; </span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"> &lsaquo; Previous</a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                  
                @if($paginator->currentPage() > 3)
                    <li class="page-item"><a  class="page-link" href="{{ $paginator->url(1) }}">1</a></li>
                @endif
                @if($paginator->currentPage() > 4)
                    <li class="page-item"><span class="page-link">...</span></li>
                @endif
                {{-- @foreach ($elements as $element)
"Three Dots" Separator
@if (is_string($element))
    <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
@endif

Array Of Links
@if (is_array($element))
    @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
            <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
        @endif
    @endforeach
@endif
@endforeach --}}
                @foreach(range(1, $paginator->lastPage()) as $i)
                    @if($i >= $paginator->currentPage() - 2 && $i <= $paginator->currentPage() + 2)
                        @if ($i == $paginator->currentPage())
                            <li class="page-item active"><span class="page-link">{{ $i }}</span></li>
                        @else
                        
                            <li class="page-item"><a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                        @endif
                        {{-- @if($i == $paginator->currentPage() + 1)
                            <li class="page-item"><a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                            @endif
                         @endif --}}
                        
                    @endif
                @endforeach
                @if($paginator->currentPage() < $paginator->lastPage() - 3)
                    <li class="page-item"><span class="page-link">...</span></li>
                @endif
                @if($paginator->currentPage() < $paginator->lastPage() - 2)
                    <li class="page-item"><a href="{{ $paginator->url($paginator->lastPage()) }}" class="page-link">{{ $paginator->lastPage() }}</a></li>
                @endif

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">Next Page &rsaquo;</a>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                            <span class="page-link" aria-hidden="true">Next Page &rsaquo;</span>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
@endif
