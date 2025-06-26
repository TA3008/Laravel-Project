<div>
    <form wire:submit.prevent="save">
        <!-- Quyền -->
        <div class="mb-3">
            <label class="form-label">Chọn quyền:</label>
            <select wire:model="role" class="form-select">
                @foreach ($roles as $r)
                    <option value="{{ $r->value }}">
                        {{ ucfirst($r->value) }}
                    </option>
                @endforeach
            </select>
            @error('role') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <!-- Trạng thái -->
        <div class="mb-3">
            <label class="form-label">Trạng thái:</label>
            <select wire:model="status" class="form-select">
                @foreach ($statuses as $s)
                    <option value="{{ $s->value }}">
                        {{ $s->value === 'active' ? 'Hoạt động' : 'Không hoạt động' }}
                    </option>
                @endforeach
            </select>
            @error('status') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-success">Lưu thay đổi</button>
            <button type="button" wire:click="$dispatch('close-edit-modal')" class="btn btn-secondary ms-2">Đóng</button>
        </div>
    </form>
</div>
