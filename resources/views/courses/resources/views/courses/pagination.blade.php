@if ($paginator->hasPages())
<nav class="pagination-purple">
    {{-- Prev --}}
    @if ($paginator->onFirstPage())
        <span class="page-btn disabled">← Prev</span>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" class="page-btn">← Prev</a>
    @endif

    {{-- Nomor halaman --}}
    @foreach ($elements as $element)
        @if (is_string($element))
            <span class="page-dots">{{ $element }}</span>
        @endif
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span class="page-btn active">{{ $page }}</span>
                @else
                    <a href="{{ $url }}" class="page-btn">{{ $page }}</a>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next --}}
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="page-btn">Next →</a>
    @else
        <span class="page-btn disabled">Next →</span>
    @endif
</nav>

<style>
    .pagination-purple { display: inline-flex; gap: 6px; flex-wrap: wrap; justify-content: center; }
    .page-btn {
        display: inline-block; min-width: 38px; padding: 8px 12px; text-align: center;
        border: 1px solid #d7c4ec; border-radius: 8px; color: #5b2d95;
        text-decoration: none; font-size: 14px; font-weight: 600; background: #fff;
    }
    .page-btn:hover { background: #f0e6fb; border-color: #7c3aed; }
    .page-btn.active { background: #7c3aed; border-color: #7c3aed; color: #fff; }
    .page-btn.disabled { opacity: .45; cursor: not-allowed; }
    .page-dots { padding: 8px 6px; color: #9b7fc4; }
</style>
@endif