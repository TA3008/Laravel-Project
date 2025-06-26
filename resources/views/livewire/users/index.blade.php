<div>
    <!-- Event trigger -->
    <div x-data x-on:user-deleted.window="alert($event.detail.message)"></div>
    
    <!-- breadcrumb -->
 <livewire:components.breadcrumb :items="$breadcrumbItems" />
 
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Danh sách người dùng</h2>
    </div>

    <!-- Search box -->
                <div style="max-width: 300px;">
                    <livewire:components.search-box :keyword="$keyword" />
                </div>
                
    <table class="table table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Role</th>
                <th>Trạng thái</th>
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
            <td>{{ $user->status }}</td>
            <td>{{ $user->created_at->format('d/m/Y') }}</td>
            <td>
                    <button class="btn btn-sm btn-warning" wire:click="edit({{ $user->id }})">Sửa</button>
                    <button wire:click="delete({{ $user->id }})" class="btn btn-sm btn-danger" onclick="return confirm('Xóa người dùng này?')">Xóa</button>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="7" class="text-center text-muted">Không có người dùng nào.</td>
        </tr>
    @endforelse
</tbody>

    </table>
    <!-- pagination -->
@include('livewire.components.pagination-controls', ['paginator' => $users])


@if ($showEditModal)
    <div class="custom-modal-backdrop"></div>

    <div class="custom-modal-wrapper">
        <div class="custom-modal">
            <!-- Header -->
            <div class="custom-modal-header">
                <h5 class="modal-title mb-0">Chỉnh sửa người dùng</h5>
                <button type="button" class="btn-close" wire:click="$set('showEditModal', false)">&times;</button>
            </div>

            <!-- Body -->
            <div class="custom-modal-body">
                <livewire:users.edit :id="$editingUserId" wire:key="edit-user-{{ $editingUserId ?? 'new' }}" />
            </div>

            <!-- Footer -->
            <!-- <div class="custom-modal-footer text-end">
                <button class="btn btn-secondary" wire:click="$set('showEditModal', false)">Đóng</button>
            </div> -->
        </div>
    </div>
@endif

