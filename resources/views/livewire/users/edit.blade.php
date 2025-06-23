<div class="container">
    <!-- breadcrumb -->
    <livewire:components.breadcrumb :items="$breadcrumbItems" />
    
    <h2>Cập nhật quyền người dùng</h2>

    <form wire:submit.prevent="save">
        <!-- Quyền -->
        <div class="form-group">
            <label for="role">Chọn quyền:</label>
            <select wire:model="role" class="form-control">
                @foreach ($roles as $r)
                    <option value="{{ $r->value }}">
                        {{ ucfirst($r->value) }}
                    </option>
                @endforeach
            </select>
        </div>
        @error('role') <div class="text-danger">{{ $message }}</div> @enderror

        <!-- Trạng thái -->
        <div class="form-group mt-3">
            <label for="status">Trạng thái:</label>
            <select wire:model="status" class="form-control">
                @foreach ($statuses as $s)
                    <option value="{{ $s->value }}">
                        {{ $s->value === 'active' ? 'Hoạt động' : 'Không hoạt động' }}
                    </option>
                @endforeach
            </select>
        </div>
        @error('status') <div class="text-danger">{{ $message }}</div> @enderror

        <button type="submit" class="btn btn-primary mt-3">Lưu thay đổi</button>
    </form>
</div>
