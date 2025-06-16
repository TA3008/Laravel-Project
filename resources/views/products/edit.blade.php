@extends('layouts.app')

@section('content')
<div class="card mt-2 mb-2 shadow-base">
    <div class="card-body pb-0">
        <form method="POST"
              action="{{ $product->id ? route('products.save', $product->id) : route('products.save') }}">
            @csrf
            @if ($product->id)
                @method('PUT')
            @endif

            <div class="mb-3">
                <label class="form-label">Tên sản phẩm <span class="text-danger">*</span></label>
                <input type="text" name="name" value="{{ old('name', $product->name) }}"
                       class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Giá <span class="text-danger">*</span></label>
                <input type="number" name="price" value="{{ old('price', $product->price) }}"
                       class="form-control" min="0" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Số lượng <span class="text-danger">*</span></label>
                <input type="number" name="stock" value="{{ old('stock', $product->stock) }}"
                       class="form-control" min="0" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Mô tả</label>
                <textarea name="description" class="form-control" rows="5">{{ old('description', $product->description) }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Lưu</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        setTimeout(function () {
            tinymce.init({
                selector: '#content',
                height: 300,
                menubar: false,
                plugins: 'advlist autolink lists link image charmap print preview anchor',
                toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat'
            });
        }, 500);
    });
</script>
@endsection
