<div class="flex justify-between items-center mt-4">
    <div>
        Hiển thị {{ $paginator->firstItem() }} đến {{ $paginator->lastItem() }} trong {{ $paginator->total() }} mục
    </div>
    <div>
        {{ $paginator->links() }}
    </div>
</div>
