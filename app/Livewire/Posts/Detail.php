<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;

class Detail extends Component
{
    public Post $post;

    public function mount($slug)
    {
        $this->post = Post::with('user')
            ->where('slug', $slug)
            ->firstOrFail();
    }

    public function render()
    {
        return view('livewire.posts.detail')->layout('layouts.app');
    }
}
