@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Cập nhật quyền người dùng</h2>

    <form action="{{ route('users.save', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="role">Chọn quyền:</label>
            <select name="role" class="form-control">
                @foreach (\App\Role::cases() as $role)
                    <option value="{{ $role->value }}" {{ $user->role === $role ? 'selected' : '' }}>
                        {{ ucfirst($role->value) }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Lưu thay đổi</button>
    </form>
</div>
@endsection
