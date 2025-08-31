@if ($paginator->hasPages())
    <nav>
        <ul class="pagination flex space-x-1">
            {{-- 前へ --}}
            @if ($paginator->onFirstPage())
                <li class="px-3 py-1 border rounded bg-gray-200 text-gray-500">«</li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-1 border rounded bg-white hover:bg-gray-100">«</a>
                </li>
            @endif

            {{-- 固定で1〜5まで表示 --}}
            @for ($i = 1; $i <= 5; $i++)
                @if ($i <= $paginator->lastPage())
                    @if ($paginator->currentPage() == $i)
                        <li class="px-3 py-1 border rounded bg-blue-500 text-white">{{ $i }}</li>
                    @else
                        <li>
                            <a href="{{ $paginator->url($i) }}" class="px-3 py-1 border rounded bg-white hover:bg-gray-100">{{ $i }}</a>
                        </li>
                    @endif
                @endif
            @endfor

            {{-- 次へ --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-1 border rounded bg-white hover:bg-gray-100">»</a>
                </li>
            @else
                <li class="px-3 py-1 border rounded bg-gray-200 text-gray-500">»</li>
            @endif
        </ul>
    </nav>
@endif