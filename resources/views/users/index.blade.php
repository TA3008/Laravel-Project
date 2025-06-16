@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Danh sách người dùng</h2>
    </div>

    <table class="table table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Role</th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
    @forelse ($users as $index => $user)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ ucfirst($user->role->value) }}</td>
            <td>{{ $user->created_at->format('d/m/Y') }}</td>
            <td>
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                <form action="{{ route('users.delete', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Xóa người dùng này?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Xóa</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="7" class="text-center text-muted">Không có người dùng nào.</td>
        </tr>
    @endforelse
</tbody>

    </table>
@endsection
