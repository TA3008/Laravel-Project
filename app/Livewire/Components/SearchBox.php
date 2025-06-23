<?php

namespace App\Livewire\Components;

use Livewire\Component;

class SearchBox extends Component
{
    public $keyword;

public function mount($keyword = '')
{
    $this->keyword = $keyword;
}

    public function search()
    {
        $this->dispatch('searchUpdated', $this->keyword);
    }

    public function render()
    {
        return view('livewire.components.search-box');
    }
}
