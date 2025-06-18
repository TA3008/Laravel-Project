<div class="card mt-2 mb-2 shadow-base">
    <div class="card-body pb-0">
        <form wire:submit.prevent="save" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Tiêu đề <span class="text-danger">*</span></label>
                <input type="text" wire:model="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tóm tắt</label>
                <textarea wire:model="excerpt" class="form-control" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Nội dung <span class="text-danger">*</span></label>
                <textarea wire:model="content" class="form-control" rows="7"></textarea>
            </div>

            <div class="mb-3">
    <label class="form-label">Ảnh đại diện</label>
    <input type="file" wire:model="image" class="form-control" accept="image/*">
    @error('image') <span class="text-danger">{{ $message }}</span> @enderror

    {{-- Preview the uploaded image --}}
    @if ($imagePreview)
        <div class="mt-2">
            <img src="{{ $imagePreview }}" alt="Preview ảnh mới" style="max-width: 200px;">
        </div>
    @elseif ($post->image)
        <div class="mt-2">
            <img src="{{ asset($post->image) }}" alt="Ảnh hiện tại" style="max-width: 200px;">
        </div>
    @endif
</div>

            <div class="mb-3">
                <label class="form-label">Trạng thái</label>
                <select wire:model="status" class="form-select">
                    <option value="draft">Nháp</option>
                    <option value="published">Công khai</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Lưu</button>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</div>
