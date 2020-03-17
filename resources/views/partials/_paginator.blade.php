<!-- Previous Page Link -->
@if ($paginator->onFirstPage())
    <li class="page-item disabled"><a class="page-link">prev</a></li>
@else
    <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">prev</a></li>
@endif

<!-- Pagination Elements -->
@foreach ($paginator as $element)
    <!-- "Three Dots" Separator -->
    @if (is_string($element))
        <li class="page-item disabled"><a class="page-link">{{ $element }}</a></li>
    @endif

    <!-- Array Of Links -->
    @if (is_array($element))
        @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
                <li class="page-item active"><a class="page-link">{{ $page }}</a></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
            @endif
        @endforeach
    @endif
@endforeach

<!-- Next Page Link -->
@if ($paginator->hasMorePages())
    <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">next</a></li>
@else
    <li class="page-item disabled"><a class="page-link">next</a></li>
@endif