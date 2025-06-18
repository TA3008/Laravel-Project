<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use App\Utilities\FileUpload;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class Edit extends Component
{
    use WithFileUploads;

    public $post;
    public $title;
    public $excerpt;
    public $content;
    public $status = 'draft';
    public $image;
    public $imagePreview;

    public function mount($id = null)
    {
        if ($id) {
            $this->post = Post::findOrFail($id);
            $this->title = $this->post->title;
            $this->excerpt = $this->post->excerpt;
            $this->content = $this->post->content;
            $this->status = $this->post->status;
            $this->imagePreview = $this->post->image;
        } else {
            $this->post = new Post();
        }
    }

    public function save()
    {
        $user = Auth::user();
        if (!$this->post->id) {
            $this->post->user_id = $user->id;
        }

        $this->post->title = $this->title;
        $this->post->excerpt = $this->excerpt;
        $this->post->content = $this->content;
        $this->post->status = $this->status;

        if ($this->image) {
        $imageName = time() . '.' . $this->image->getClientOriginalExtension();
        $this->image->storeAs('assets/uploads/posts', $imageName, 'public');

        $this->post->image = 'assets/uploads/posts/' . $imageName;
    }

        $this->post->save();

        return redirect()->route('posts.index')->with('success', 'Lưu thành công');
    }

    public function updatedImage()
    {
        $this->imagePreview = $this->image->temporaryUrl();
    }

    public function render()
    {
        return view('livewire.posts.edit');
    }
}
