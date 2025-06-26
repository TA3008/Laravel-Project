@if ($paginator->hasPages())
    {{ $paginator->links('pagination::bootstrap-5') }}
@else
    <div class="d-flex justify-content-end">
        <span class="page-circle">1</span>
    </div>
@endif
