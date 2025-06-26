<div>
    <!-- Event trigger -->
    <div x-data x-on:post-deleted.window="alert($event.detail.message)"></div>

    <!-- Breadcrumb -->
    <livewire:components.breadcrumb :items="$breadcrumbItems" />

    <!-- Page header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Danh sách bài viết</h2>
        <div class="d-flex align-items-center" style="gap: 10px;">
            <!-- Search -->
            <div style="max-width: 300px;">
                <livewire:components.search-box :keyword="$keyword" />
            </div>
            <!-- Add button -->
            <a href="#" class="btn btn-primary" wire:click="create">Thêm mới</a>
        </div>
    </div>

    <!-- Table -->
    <table class="table table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th>STT</th>
                <th>Tên bài viết</th>
                <th>Ảnh</th>
                <th>Tóm tắt</th>
                <th>Danh mục</th>
                <th>Trạng thái</th>
                <th>Người tạo</th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $index => $post)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        <a href="{{ route('posts.detail', $post->slug) }}">{{ $post->title }}</a>
                    </td>
                    <td>
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="Ảnh bài viết" style="max-width: 100px;">
                        @else
                            <span class="text-muted">Không có ảnh</span>
                        @endif
                    </td>
                    <td>{{ $post->excerpt }}</td>
                    <td>
                        @if ($post->categories->isNotEmpty())
                            @foreach ($post->categories as $category)
                                <span class="badge bg-secondary me-1">{{ $category->name }}</span>
                            @endforeach
                        @else
                            <span class="text-muted">Không có danh mục</span>
                        @endif
                    </td>
                    <td>{{ $post->status }}</td>
                    <td>{{ $post->user->name ?? 'Không xác định' }}</td>
                    <td>{{ $post->created_at->format('d/m/Y') }}</td>
                    <td>
                        <button class="btn btn-sm btn-warning" wire:click="edit({{ $post->id }})">Sửa</button>
                        <button class="btn btn-sm btn-danger" wire:click="delete({{ $post->id }})" onclick="return confirm('Xóa bài viết này?')">Xóa</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center text-muted">Không có bài viết nào.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    @include('livewire.components.pagination-controls', ['paginator' => $posts])

    <!-- Modal -->
@if ($showEditModal)
    <div class="custom-modal-backdrop"></div>

    <div class="custom-modal-wrapper">
        <div class="custom-modal">
            <!-- Header -->
            <div class="custom-modal-header">
                <h5 class="modal-title mb-0">Chỉnh sửa bài viết</h5>
                <button type="button" class="btn-close" wire:click="$set('showEditModal', false)">&times;</button>
            </div>

            <!-- Body -->
            <div class="custom-modal-body">
                <livewire:posts.edit :id="$editingPostId" wire:key="edit-post-{{ $editingPostId ?? 'new' }}" />
            </div>

            <!-- Footer -->
            <!-- <div class="custom-modal-footer text-end">
                <button class="btn btn-secondary" wire:click="$set('showEditModal', false)">Đóng</button>
            </div> -->
        </div>
    </div>
@endif






