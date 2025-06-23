<?php

namespace App\Livewire\Categories;

use App\Models\Category;
use App\Enums\StatusEnum;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class Edit extends Component
{
    public ?Category $category = null;
    public $id;
    public string $name = '';
    public string $slug = '';
    public string $status = StatusEnum::ACTIVE->value;
    public array $breadcrumbItems = [];

    public function mount($id = null)
    {
        $user = Auth::user();

        if ($id) {
            $category = Category::findOrFail($id);

            $this->category = $category;
            $this->id = $category->id;
            $this->name = $category->name;
            $this->slug = $category->slug;
            $this->status = $category->status;

            $this->breadcrumbItems = [
                ['label' => 'Danh mục', 'url' => route('categories.index')],
                ['label' => $category->name],
            ];
        } else {
            $this->category = new Category();

            $this->breadcrumbItems = [
                ['label' => 'Danh mục', 'url' => route('categories.index')],
                ['label' => 'Tạo mới'],
            ];
        }
    }

    public function save()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('categories', 'slug')->ignore($this->category?->id)
            ],
            'status' => ['required', Rule::in(StatusEnum::values())],
        ]);

        $nameChanged = $this->category->exists && $this->name !== $this->category->name;

        $data = [
            'name' => $this->name,
            'slug' => $nameChanged ? Str::slug($this->name) : $this->slug, // Nếu tên đã thay đổi, tự động tạo slug
            'status' => $this->status,
        ];

        if ($this->category->exists) {
            $this->category->update($data);
        } else {
            $this->category = Category::create($data);
        }

        return redirect()->route('categories.index')->with('success', 'Lưu danh mục thành công!');
    }

    public function render()
    {
        return view('livewire.categories.edit', [
            'statusOptions' => StatusEnum::options(),
            'breadcrumbItems' => $this->breadcrumbItems,
        ]);
    }
}
