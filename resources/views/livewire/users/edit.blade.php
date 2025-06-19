<div class="container">
    <h2>Cập nhật quyền người dùng</h2>

    <form wire:submit.prevent="save">
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

        <button type="submit" class="btn btn-primary mt-2">Lưu thay đổi</button>
    </form>
</div>
