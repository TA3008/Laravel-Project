<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\TemporaryUploadedFile;
use Illuminate\Support\Facades\Auth;

class Edit extends Component
{
    use WithFileUploads;

    public $post;
    public $id;
    public $title;
    public $excerpt;
    public $content;
    public $status = 'draft';
    public $image;
    public $imagePreview;
    public $allCategories = [];
    public $selectedCategories = [];
    public $breadcrumbItems = [];

    public function mount($id = null)
    {
        $user = auth()->user();
        $this->allCategories = Category::all();

        if ($id) {
            $post = Post::findOrFail($id);

            $role = $user && $user->role ? $user->role->value : null;
            if ($role === 'admin') {
                // Admin: always allow
            } elseif ($role === 'editor' && $post->user_id === $user->id) {
                // Editor: only allow if owns the post
            } else {
                abort(403, 'Bạn không có quyền sửa bài viết này.');
            }

            $this->breadcrumbItems = [
                [
                    'label' => 'Bài viết',
                    'url' => route('posts.index'),
                ],
                [
                    'label' => $post->title,
                    'url' => '',
                ],
            ];

            $this->post = $post;
            $this->title = $post->title;
            $this->excerpt = $post->excerpt;
            $this->content = $post->content;
            $this->status = $post->status;
            $this->imagePreview = $post->image; // dùng khi không chọn ảnh mới
            $this->selectedCategories = $post->categories()->pluck('id')->toArray();
        } else {
            $this->post = new Post();
        }

    }

    public function updatedImage()
    {
        logger('Uploaded image instance', ['image' => $this->image]);

        if ($this->image instanceof TemporaryUploadedFile) {
            $this->imagePreview = $this->image->temporaryUrl();
        }
    }

    public function save()
    {
        $rules = [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        $this->validate($rules);

        $user = Auth::user();

        if (!$this->post->id) {
            $this->post->user_id = $user->id;
        }

        $this->post->title = $this->title;
        $this->post->excerpt = $this->excerpt;
        $this->post->content = $this->content;
        $this->post->status = $this->status;
        
        // Update slug only if it's a new post or title has changed
        $isNew = !$this->post->exists;
        $this->post->slug = $this->post->slug ?: Str::slug($$this->title);
        if ($isNew || $this->title !== $this->post->getOriginal('title')) {
            $this->post->slug = Str::slug($this->title);
        }

        // Handle image upload
        if ($this->image) {
            $imageName = time() . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('assets/uploads/posts', $imageName, 'public');
            $this->post->image = 'assets/uploads/posts/' . $imageName;
        }

        $this->post->save();
        $this->post->categories()->sync($this->selectedCategories);

        if ($this->redirectToIndex ?? true) {
            return redirect()->route('posts.index')->with('success', 'Lưu thành công');
        }
    }

    public function render()
    {
        return view('livewire.posts.edit');
    }
}
