<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $users = User::all();
        return view('livewire.users.index', compact('users'));
    }

    public function delete($id)
    {
        $user = Users::findOrFail($id);

        $user->delete();

        $this->dispatch('user-deleted', ['message' => 'Đã xóa người dùng thành công!']);
    }
}
