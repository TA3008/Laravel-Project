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

        if (Auth::id() !== $post->user_id && Auth::user()->role !== 'admin') {
            $this->dispatchBrowserEvent('notify', ['type' => 'error', 'message' => 'Không có quyền xóa.']);
            return;
        }

        $post->delete();
        $this->dispatchBrowserEvent('notify', ['type' => 'success', 'message' => 'Xóa bài viết thành công.']);
        $this->emit('postDeleted');
    }
}
