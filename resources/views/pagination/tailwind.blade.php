@if ($paginator->hasPages())
<nav class="flex items-center justify-center space-x-1 mt-4" role="navigation" aria-label="Pagination Navigation">

    {{-- Tombol Previous (selalu biru) --}}
    @if ($paginator->onFirstPage())
        <span class="px-3 py-1 text-sm text-white rounded-md shadow-md"
              style="background:#1f3a93;opacity:.6;cursor:not-allowed;">«</span>
    @else
        <a href="{{ $paginator->previousPageUrl() }}"
           class="px-3 py-1 text-sm text-white rounded-md shadow-md transition"
           style="background:#1f3a93;">«</a>
    @endif

    {{-- Nomor Halaman (oren semua) --}}
    @foreach ($elements as $element)
        @if (is_array($element))
            @foreach ($element as $page => $url)
                <a href="{{ $url }}"
                   class="px-3 py-1 text-sm rounded-md shadow-md transition"
                   style="background:#e67e22;color:white;">{{ $page }}</a>
            @endforeach
        @endif
    @endforeach

    {{-- Tombol Next (selalu biru) --}}
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}"
           class="px-3 py-1 text-sm text-white rounded-md shadow-md transition"
           style="background:#1f3a93;">»</a>
    @else
        <span class="px-3 py-1 text-sm text-white rounded-md shadow-md"
              style="background:#1f3a93;opacity:.6;cursor:not-allowed;">»</span>
    @endif
</nav>
@endif
