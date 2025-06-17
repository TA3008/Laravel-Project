@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Danh sách bài viết</h2>
    <div class="d-flex align-items-center" style="gap: 10px;">
        <div style="max-width: 300px;">
            <form action="{{ route('posts.index') }}" method="GET" class="d-flex">
                <input type="text" name="keyword" value="{{ request('keyword') }}" class="form-control me-2" placeholder="Tìm tiêu đề...">
                <button type="submit" class="btn btn-secondary">Tìm</button>
            </form>
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
    <a href="{{ route('posts.detail', $post->slug) }}">
        {{ $post->title }}
    </a>
</td>

            <td>
    @if ($post->image)
        <img src="{{ asset($post->image) }}" alt="Ảnh bài viết" style="max-width: 100px; height: auto;">
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
                <form action="{{ route('posts.delete', $post->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Xóa sản phẩm này?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Xóa</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="7" class="text-center text-muted">Không có bài viết nào.</td>
        </tr>
    @endforelse
</tbody>

    </table>
@endsection
