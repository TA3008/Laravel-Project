<?php

namespace App\Livewire\Users;

use App\Models\User;
use App\Enums\RoleEnum;
use Livewire\Component;
use App\Enums\StatusEnum;

class Edit extends Component
{
    public User $user;
    public string $role;
    public string $status;

    public $breadcrumbItems = [];

    public function mount($id)
    {
        $this->user = User::findOrFail($id);
        $this->role = $this->user->role->value ?? RoleEnum::User->value;
        $this->status = $this->user->status ?? StatusEnum::ACTIVE->value;
    }

    public function save()
    {
        $this->validate([
            'role' => 'required|in:' . implode(',', array_column(RoleEnum::cases(), 'value')),
            'status' => 'required|in:' . implode(',', array_column(StatusEnum::cases(), 'value')),
        ]);

        $this->user->role = RoleEnum::from($this->role);
        $this->user->status = $this->status;
        $this->user->save();

        session()->flash('success', 'Cập nhật người dùng thành công!');
        return redirect()->route('users.index');
    }

    public function render()
    {
        return view('livewire.users.edit', [
            'roles' => RoleEnum::cases(),
            'statuses' => StatusEnum::cases(),
        ]);
    }
}
