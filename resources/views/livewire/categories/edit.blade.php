<div class="card mt-2 mb-2 shadow-base w-full">
    <!-- breadcrumb -->
    <livewire:components.breadcrumb :items="$breadcrumbItems" />

    <div class="card-body pb-0">
        <form wire:submit.prevent="save">
            <!-- Tên danh mục -->
            <div class="mb-3">
                <label class="form-label">Tên danh mục <span class="text-danger">*</span></label>
                <input type="text" wire:model.defer="name" class="form-control" required>
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <!-- Slug -->
            <div class="mb-3">
                <label class="form-label">Slug</label>
                <input type="text" wire:model.defer="slug" class="form-control" placeholder="Tự động tạo nếu để trống">
                @error('slug') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <!-- Trạng thái -->
            <div class="mb-3">
                <label class="form-label">Trạng thái</label>
                <select wire:model.defer="status" class="form-select">
                    @foreach (\App\Enums\StatusEnum::options() as $value => $label)
                        <option value="{{ $value }}">{{ $label }}</option>
                    @endforeach
                </select>
                @error('status') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <!-- Nút hành động -->
            <button type="submit" class="btn btn-success">Lưu</button>
            <button type="button" wire:click="$dispatch('closeEditModal').to('categories.index')" class="btn btn-secondary">Đóng</button>
        </form>
    </div>
</div>
