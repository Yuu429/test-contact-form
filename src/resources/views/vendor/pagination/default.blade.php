@if ($paginator->onFirstPage())
    <span class="page-link arrow disabled">‹</span>
@else
    <a href="{{ $paginator->previousPageUrl() }}" class="page-link arrow">‹</a>
@endif

@foreach ($elements as $element)
    @if (is_array($element))
        @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
                <span class="page-link active">{{ $page }}</span>
            @else
                <a href="{{ $url }}" class="page-link">{{ $page }}</a>
            @endif
        @endforeach
    @endif
@endforeach

@if ($paginator->hasMorePages())
    <a href="{{ $paginator->nextPageUrl() }}" class="page-link arrow">›</a>
@else
    <span class="page-link arrow disabled">›</span>
@endif