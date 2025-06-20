<div class="card mt-2 mb-2 shadow-base">
    <!-- breadcrumb -->
 <livewire:components.breadcrumb :items="$breadcrumbItems" />
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

            <div class="mb-3" wire:ignore>
                <label class="form-label">Nội dung <span class="text-danger">*</span></label>
                <textarea id="content-editor" class="form-control" rows="7">{!! $content !!}</textarea>
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
                        <img src="{{ asset('storage/' . $post->image) }}" alt="Ảnh hiện tại" style="max-width: 200px;">
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

@push('scripts')
<script>
    document.addEventListener('livewire:load', function () {
        const componentId = @js($this->id);
        initTinyMCE(componentId);
    });

    function initTinyMCE(componentId) {
        if (tinymce.get('content-editor')) {
            tinymce.get('content-editor').remove();
        }

        tinymce.init({
    selector: #'content-editor',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    images_upload_url: '/new/upload',
    image_class_list: [
        { title: 'Responsive', value: 'img-responsive' }
        //{ title: 'None', value: '' } 
    ]
});
    }

    Livewire.hook('message.processed', (message, component) => {
        if (component.name === 'posts.edit') {
            initTinyMCE(component.id);
        }
    });
</script>
@endpush
