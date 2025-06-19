<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $keyword = '';

    protected $listeners = ['postDeleted' => '$refresh'];

    public function render()
    {
        $query = Post::with('user')->latest();

        if ($this->keyword) {
            $query->where('title', 'ILIKE', '%' . $this->keyword . '%');
        }

        $posts = $query->get();

        return view('livewire.posts.index', compact('posts'));
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        $this->dispatch('post-deleted', ['message' => 'Đã xóa bài viết thành công!']);
    }
}
