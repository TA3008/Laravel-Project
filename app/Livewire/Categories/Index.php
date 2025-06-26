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

    public $showEditModal = false;
    public $editingCategoryId = null;

    protected $listeners = [
        'searchUpdated' => 'onSearchUpdated',
        'close-edit-modal' => 'closeEditModal',
        'categories-deleted' => '$refresh'
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

    public function edit($id)
    {
        logger('Đang mở modal chỉnh sửa danh mục', ['id' => $id]);
        $this->editingCategoryId = $id;
        $this->showEditModal = true;
    }

    public function create()
    {
        $this->editingCategoryId = null;
        $this->showEditModal = true;
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        $this->dispatch('categories-deleted', [
            'message' => 'Đã xóa danh mục thành công!'
        ]);
    }

    public function closeEditModal()
    {
        $this->showEditModal = false;
    }
}
