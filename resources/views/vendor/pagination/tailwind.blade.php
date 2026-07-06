<link rel="stylesheet" href="{{asset('assets/css/pagination.css')}}">
@if ($paginator->lastPage() > 1)
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pagination_links">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                            <span aria-hidden="true">
                                <i class="fa-solid fa-chevron-left left_icon"></i>
                            </span>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="{{ __('pagination.previous') }}">
                            <i class="fa-solid fa-chevron-left left_icon"></i>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @php
                        $half_total_links = floor(6 / 2);
                        $from = $paginator->currentPage() - $half_total_links;
                        $to = $paginator->currentPage() + $half_total_links;
                        if ($paginator->currentPage() < $half_total_links) {
                            $to += $half_total_links - $paginator->currentPage();
                        }
                        if ($paginator->currentPage() > $paginator->lastPage() - $half_total_links) {
                            $from -= $paginator->currentPage() - $paginator->lastPage() + $half_total_links;
                        }
                    @endphp

                    {{-- First Page Link --}}
                    @if ($from > 1)
                        <a href="{{ $paginator->url(1) }}" aria-label="{{ __('Go to page :page', ['page' => 1]) }}">1</a>
                        @if ($from > 2)
                            <span>...</span>
                        @endif
                    @endif

                    {{-- Pagination Elements --}}
                    @for ($i = $from; $i <= $to; $i++)
                        @if ($i > 0 && $i <= $paginator->lastPage())
                            @if ($i == $paginator->currentPage())
                                <span aria-current="page">
                                    <span>{{ $i }}</span>
                                </span>
                            @else
                                <a href="{{ $paginator->url($i) }}" aria-label="{{ __('Go to page :page', ['page' => $i]) }}">
                                    {{ $i }}
                                </a>
                            @endif
                        @endif
                    @endfor

                    {{-- Last Page Link --}}
                    @if ($to < $paginator->lastPage())
                        @if ($to < $paginator->lastPage() - 1)
                            <span>...</span>
                        @endif
                        @for ($i = $paginator->lastPage() - 2; $i <= $paginator->lastPage(); $i++)
                            <a href="{{ $paginator->url($i) }}" aria-label="{{ __('Go to page :page', ['page' => $i]) }}">{{ $i }}</a>
                        @endfor
                    @endif

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="" aria-label="{{ __('pagination.next') }}">
                            <i class="fa-solid fa-chevron-right"></i>
                        </a>
                    @else
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <span class="" aria-hidden="true">
                                <i class="fa-solid fa-chevron-right"></i>
                            </span>
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endif


