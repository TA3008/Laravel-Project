<div>
    <!-- message -->
    <div x-data x-on:category-deleted.window="alert($event.detail.message)"></div>

    <!-- breadcrumb -->
    <livewire:components.breadcrumb :items="$breadcrumbItems" />

    <div>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Danh sách danh mục</h2>
            <div class="d-flex align-items-center" style="gap: 10px;">

                <!-- Search box -->
                <div style="max-width: 300px;">
                    <livewire:components.search-box :keyword="$keyword" />
                </div>

                <!-- Nút thêm -->
                <a href="#" wire:click="create" class="btn btn-primary">Thêm mới</a>

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
                            <button wire:click="edit({{ $category->id }})" class="btn btn-sm btn-warning">Sửa</button>

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


    <!-- Modal -->
@if ($showEditModal)
    <div class="custom-modal-backdrop"></div>

    <div class="custom-modal-wrapper">
        <div class="custom-modal">
            <!-- Header -->
            <div class="custom-modal-header">
                <h5 class="modal-title mb-0">Chỉnh sửa danh mục</h5>
                <button type="button" class="btn-close" wire:click="$set('showEditModal', false)">&times;</button>
            </div>

            <!-- Body -->
            <div class="custom-modal-body">
                <livewire:categories.edit :id="$editingCategoryId" wire:key="edit-category-{{ $editingCategoryId ?? 'new' }}" />
            </div>

            <!-- Footer -->
            <!-- <div class="custom-modal-footer text-end">
                <button class="btn btn-secondary" wire:click="$set('showEditModal', false)">Đóng</button>
            </div> -->
        </div>
    </div>
@endif

