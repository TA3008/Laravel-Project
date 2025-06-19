<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use App\Enums\RoleEnum;

class Edit extends Component
{
    public User $user;
    public string $role;

    public function mount($id)
    {
        $this->user = User::findOrFail($id);
        $this->role = $this->user->role->value ?? RoleEnum::User->value;
    }

    public function save()
    {
        $this->validate([
            'role' => 'required|in:' . implode(',', array_column(RoleEnum::cases(), 'value')),
        ]);

        $this->user->role = RoleEnum::from($this->role);
        $this->user->save();

        session()->flash('success', 'Cập nhật quyền thành công!');
        return redirect()->route('users.index');
    }

    public function render()
    {
        return view('livewire.users.edit', [
            'roles' => RoleEnum::cases(),
        ]);
    }
}
