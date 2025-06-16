@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Danh sách sản phẩm</h2>
        <a href="{{ route('products.edit') }}" class="btn btn-primary">Thêm mới sản phẩm</a>
    </div>

    <table class="table table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Mô tả</th>
                <th>Số lượng</th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
    @forelse ($products as $index => $product)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ number_format($product->price, 0, ',', '.') }} đ</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->stock }}</td>
            <td>{{ $product->created_at->format('d/m/Y') }}</td>
            <td>
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                <form action="{{ route('products.delete', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Xóa sản phẩm này?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Xóa</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="7" class="text-center text-muted">Không có sản phẩm nào.</td>
        </tr>
    @endforelse
</tbody>

    </table>
@endsection
