<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;

class Detail extends Component
{
    public Post $post;
    public $breadcrumbItems = [];

    public function mount($slug)
    {
        $this->post = Post::with('user')
            ->where('slug', $slug)
            ->firstOrFail();
        
        $this->breadcrumbItems = [
        [
            'label' => 'Bài viết',
            'url' => route('posts.index'),
        ],
        [
            'label' => $this->post->title,
            'url' => '', 
        ],
    ];
    }

    public function render()
    {
        return view('livewire.posts.detail')->layout('layouts.app');
    }
}
