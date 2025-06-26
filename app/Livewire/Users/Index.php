<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $keyword = '';
    public $breadcrumbItems = [];

    public $editingUserId = null;
    public $showEditModal = false;

    protected $listeners = [
        'searchUpdated' => 'onSearchUpdated',
        'close-edit-modal' => 'closeEditModal',
        'user-deleted' => '$refresh'
    ];
    
    public function render()
{
    $query = User::query();

    if ($this->keyword) {
        $query->where(function ($q) {
            $q->where('name', 'like', '%' . $this->keyword . '%')
                ->orWhere('email', 'like', '%' . $this->keyword . '%');
        });
    }

    $users = $query->latest()->paginate(12);

    return view('livewire.users.index', compact('users'));
}

    public function onSearchUpdated($keyword)
    {
        $this->keyword = $keyword;
        $this->resetPage();
    }

    public function create()
    {
        $this->editingUserId = null; 
        $this->showEditModal = true;
    }

    public function edit($id)
    {
        $this->editingUserId = $id;
        $this->showEditModal = true;
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        $this->dispatch('user-deleted', ['message' => 'Đã xóa người dùng thành công!']);
    }
}
