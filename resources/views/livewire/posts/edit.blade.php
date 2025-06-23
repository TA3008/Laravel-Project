<div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm">
    <div class="bg-white dark:bg-gray-800 rounded-xl p-6 w-full max-w-3xl shadow-lg relative">

        <!-- Nút đóng -->
        <button 
            type="button"
            class="absolute top-3 right-4 text-gray-500 hover:text-red-600 text-2xl"
            onclick="window.location='{{ route('posts.index') }}'"
        >&times;</button>

        <!-- Nội dung form gốc -->
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
                            @if ($image)
                                <img src="{{ $image->temporaryUrl() }}" alt="Ảnh preview" style="max-width: 200px;">
                            @elseif ($imagePreview)
                                <img src="{{ asset('storage/' . $post->image) }}" alt="Ảnh hiện tại" style="max-width: 200px;">
                            @endif
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label font-semibold">Danh mục</label>
                        <div class="grid grid-cols-2 gap-2">
                            @foreach ($allCategories as $category)
                                <label class="flex items-center space-x-2">
                                    <input 
                                        type="checkbox" 
                                        wire:model="selectedCategories" 
                                        value="{{ $category->id }}" 
                                        class="form-checkbox rounded"
                                    >
                                    <span>{{ $category->name }}</span>
                                </label>
                            @endforeach
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
                    selector: '#content-editor',
                    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
                    setup(editor) {
                        editor.on('Change KeyUp', () => {
                            Livewire.find(componentId).set('content', editor.getContent());
                        });
                    }
                });
            }

            Livewire.hook('message.processed', (message, component) => {
                initTinyMCE(component.id);
            });
        </script>
        @endpush

    </div>
</div>
