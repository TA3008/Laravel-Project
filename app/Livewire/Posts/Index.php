<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $keyword = '';
    public $breadcrumbItems = [];

    protected $listeners = ['postDeleted' => '$refresh', 'searchUpdated' => 'onSearchUpdated',];

    public function render()
    {
        $query = Post::with('user')->latest();

        $posts = Post::query()
                ->when($this->keyword, function ($query) {
                    $query->where('title', 'like', '%' . $this->keyword . '%');
                })
                ->paginate(12);

        return view('livewire.posts.index', compact('posts'));
    }
    public function onSearchUpdated($keyword) 
    {
        $this->keyword = $keyword;
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        $this->dispatch('post-deleted', ['message' => 'Đã xóa bài viết thành công!']);
    }
}
