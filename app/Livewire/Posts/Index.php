<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use WithPagination;
    
    public $keyword = '';
    public $categoryId = null;
    public $breadcrumbItems = [];

    public $editingPostId = null;
    public $showEditModal = false;

    protected $listeners = [
        'postDeleted' => '$refresh', 
        'searchUpdated' => 'onSearchUpdated',
        'close-edit-modal' => 'closeEditModal',
    ];

    public function render()
    {
        $posts = Post::with('user', 'categories')
            ->when($this->keyword, fn($query) =>
                $query->where('title', 'like', '%' . $this->keyword . '%')
            )
            ->when($this->categoryId, fn($query) =>
                $query->whereHas('categories', fn($q) =>
                    $q->where('id', $this->categoryId)
                )
            )
            ->latest()
            ->paginate(1);

        return view('livewire.posts.index', compact('posts'));
    }
    public function onSearchUpdated($keyword)
    {
        $this->keyword = $keyword;
        $this->resetPage();
    }

    public function updatingCategoryId()
    {
        $this->resetPage();
    }

    public function create()
    {
        $this->editingPostId = null; 
        $this->showEditModal = true;
    }

    public function edit($id)
    {
        $this->editingPostId = $id;
        $this->showEditModal = true;
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        $this->dispatch('post-deleted', ['message' => 'Đã xóa bài viết thành công!']);
    }

    public function closeEditModal()
    {
        $this->showEditModal = false;
    }
}
