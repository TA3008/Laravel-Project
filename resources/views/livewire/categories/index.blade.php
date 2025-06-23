<div>
    <!-- message -->
    <div x-data x-on:category-deleted.window="alert($event.detail.message)"></div>

    <!-- breadcrumb -->
    <livewire:components.breadcrumb :items="$breadcrumbItems" />

    <div>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Danh sách danh mục</h2>
            <div class="d-flex align-items-center" style="gap: 10px;">

                <!-- Search box (nếu có) -->
                <div style="max-width: 300px;">
                    <livewire:components.search-box :keyword="$keyword" />
                </div>

                <!-- Nút thêm -->
                <a href="{{ route('categories.edit') }}" class="btn btn-primary">Thêm mới</a>
            </div>
        </div>

        <!-- Bảng dữ liệu -->
        <table class="table table-bordered table-hover">
            <thead class="thead-light">
                <tr>
                    <th>STT</th>
                    <th>Tên danh mục</th>
                    <th>Slug</th>
                    <th>Số bài viết</th>
                    <th>Trạng thái</th>
                    <th>Ngày tạo</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $index => $category)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>{{ $category->posts_count ?? 0 }}</td>
                        <td>{{ $category->status }}</td>
                        <td>{{ $category->created_at->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                            <button wire:click="delete({{ $category->id }})" class="btn btn-sm btn-danger" onclick="return confirm('Xóa danh mục này?')">Xóa</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">Không có danh mục nào.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination -->
        @include('livewire.components.pagination-controls', ['paginator' => $categories])
    </div>
</div>
