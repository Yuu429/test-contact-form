@if ($paginator->hasPages())
    <nav>
        <ul class="inline-flex">
            {{-- 前へ --}}
            @if ($paginator->onFirstPage())
                <li class="px-3 py-1 bg-white text-gray-400 border">«</li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}"
                       class="px-3 py-1 bg-white text-gray-700 hover:bg-gray-100 border block">«</a>
                </li>
            @endif

            {{-- ページ番号 --}}
            @foreach ($elements as $element)
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="px-3 py-1 bg-blue-500 text-white border">{{ $page }}</li>
                        @else
                            <li>
                                <a href="{{ $url }}"
                                   class="px-3 py-1 bg-white text-gray-700 hover:bg-gray-100 border block">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- 次へ --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}"
                       class="px-3 py-1 bg-white text-gray-700 hover:bg-gray-100 border block">»</a>
                </li>
            @else
                <li class="px-3 py-1 bg-white text-gray-400 border">»</li>
            @endif
        </ul>
    </nav>
@endif