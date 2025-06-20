<?php

namespace App\Livewire\Components;
use Illuminate\Pagination\LengthAwarePaginator;

use Livewire\Component;

class PaginationControls extends Component
{
    public LengthAwarePaginator $paginator;

    public function render()
    {
        return view('livewire.components.pagination-controls');
    }
}
