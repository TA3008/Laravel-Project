<?php

namespace App\Livewire\Components;

use Livewire\Component;

class SearchBox extends Component
{
    public $keyword = '';

    public function updatedKeyword()
    {
        $this->dispatch('searchUpdated', keyword: $this->keyword);
    }
    
    public function render()
    {
        return view('livewire.components.search-box');
    }
}
