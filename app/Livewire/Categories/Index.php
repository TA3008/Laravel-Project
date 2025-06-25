<?php

namespace App\Livewire\Categories;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $keyword = '';
    public $breadcrumbItems = [];
    protected $queryString = ['keyword'];

    protected $listeners = [
        'searchUpdated' => 'onSearchUpdated',
    ];

    public function render()
    {
        $query = Category::query()
            ->withCount('posts');

        if ($this->keyword) {
            $query->where('name', 'like', '%' . $this->keyword . '%');
        }

        $categories = $query->latest()->paginate(10);

        return view('livewire.categories.index', compact('categories'));
    }

    public function onSearchUpdated($keyword)
    {
        $this->keyword = $keyword;
        $this->resetPage();
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        $this->dispatch('categories-deleted', [
            'message' => 'Đã xóa danh mục thành công!'
        ]);
    }
}
