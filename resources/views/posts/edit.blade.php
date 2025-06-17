@extends('layouts.app')

@section('content')
<div class="card mt-2 mb-2 shadow-base">
    <div class="card-body pb-0">
        <form method="POST"
              action="{{ $post->id ? route('posts.save', $post->id) : route('posts.save') }}"
              enctype="multipart/form-data"> {{-- Cho phép upload file --}}
            @csrf
            @if ($post->id)
                @method('PUT')
            @endif

            <div class="mb-3">
                <label class="form-label">Tiêu đề <span class="text-danger">*</span></label>
                <input type="text" name="title" value="{{ old('title', $post->title) }}"
                       class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tóm tắt</label>
                <textarea name="excerpt" class="form-control" rows="3">{{ old('excerpt', $post->excerpt) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Nội dung <span class="text-danger">*</span></label>
                <textarea id="content" name="content" class="form-control" rows="7">{{ old('content', $post->content) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Ảnh đại diện</label>
                <input type="file" name="image" class="form-control" accept="image/*" onchange="previewImage(event)">
                
                {{-- Preview ảnh đã có sẵn (edit mode) --}}
                @if ($post->image)
                    <div class="mt-2">
                        <img id="preview" src="{{ asset($post->image) }}" alt="Ảnh hiện tại" style="max-width: 200px;">
                    </div>
                @else
                    <div class="mt-2">
                        <img id="preview" src="#" style="display:none; max-width: 200px;" alt="Preview ảnh mới">
                    </div>
                @endif
            </div>

            <div class="mb-3">
                <label class="form-label">Trạng thái</label>
                <select name="status" class="form-select">
                    <option value="draft" {{ old('status', $post->status) == 'draft' ? 'selected' : '' }}>Nháp</option>
                    <option value="published" {{ old('status', $post->status) == 'published' ? 'selected' : '' }}>Công khai</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Lưu</button>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</div>
@endsection

<script>
    var Common = function () { };

    Common.prototype.initTinyMce = function (selector) {
        tinymce.init({
            selector: selector,
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
            images_upload_url: '/new/upload',
            image_class_list: [
                { title: 'Responsive', value: 'img-responsive' }
            ]
        });
    };

    var common = new Common();

    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function () {
            const output = document.getElementById('preview');
            output.src = reader.result;
            output.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            setTimeout(function () {
                common.initTinyMce('#content');
            }, 1000);
        });
    </script>
@endpush
