<div class="card mt-2 mb-2 shadow-base">
    <div class="card-body pb-0">
        <form wire:submit.prevent="save">
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

                <input 
                    type="file" 
                    wire:model="image" 
                    class="form-control" 
                    accept="image/*"
                >

                @error('image') <span class="text-danger">{{ $message }}</span> @enderror

                <div class="mt-2">
                    {{-- Nếu chọn ảnh mới --}}
                    @if ($image)
                        <img src="{{ $image->temporaryUrl() }}" alt="Ảnh preview" style="max-width: 200px;">
                    {{-- Nếu chưa chọn ảnh mới, hiển thị ảnh cũ --}}
                    @elseif ($imagePreview)
                        <img src="{{ asset($imagePreview) }}" alt="Ảnh hiện tại" style="max-width: 200px;">
                    @endif
                </div>
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
