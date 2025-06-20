<div>
    <!-- message -->
    <div
    x-data
    x-on:post-deleted.window="alert($event.detail.message)"
></div>

<!-- breadcrumb -->
 <livewire:components.breadcrumb :items="$breadcrumbItems" />
 
<div>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Danh sách bài viết</h2>
    <div class="d-flex align-items-center" style="gap: 10px;">
        <div style="max-width: 300px;">
            <livewire:components.search-box 
                :keyword="$keyword"
                wire:keydown.enter="$refresh"
                wire:search-updated="onSearchUpdated"
            />
        </div>
        <a href="{{ route('posts.edit') }}" class="btn btn-primary">Thêm mới</a>
    </div>
</div>

<table class="table table-bordered table-hover">
    <thead class="thead-light">
        <tr>
            <th>STT</th>
            <th>Tên bài viết</th>
            <th>Ảnh</th>
            <th>Tóm tắt</th>
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
                <td>{{ $post->status }}</td>
                <td>{{ $post->user->name ?? 'Không xác định' }}</td>
                <td>{{ $post->created_at->format('d/m/Y') }}</td>
                <td>
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                    <button wire:click="delete({{ $post->id }})" class="btn btn-sm btn-danger" onclick="return confirm('Xóa bài viết này?')">Xóa</button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" class="text-center text-muted">Không có bài viết nào.</td>
            </tr>
        @endforelse
    </tbody>
</table>
<!-- pagination -->
@include('livewire.components.pagination-controls', ['paginator' => $posts])


</div>
