<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $breadcrumbItems = [];
    
    public function render()
    {
        $users = User::latest()->paginate(12);
        return view('livewire.users.index', compact('users'));
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        $this->dispatch('user-deleted', ['message' => 'Đã xóa người dùng thành công!']);
    }
}
