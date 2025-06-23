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

    protected $listeners = [
        'postDeleted' => '$refresh', 
        'searchUpdated' => 'onSearchUpdated',
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
            ->paginate(12);

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

    public function delete($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        $this->dispatch('post-deleted', ['message' => 'Đã xóa bài viết thành công!']);
    }
}
