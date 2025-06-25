<?php

namespace App\Livewire\Components;
use Illuminate\Pagination\LengthAwarePaginator;

use Livewire\Component;

class PaginationControls extends Component
{
    public LengthAwarePaginator $paginator;

    public function boot(): void
    {
        Paginator::useTailwind();
    }
    public function render()
    {
        return view('livewire.components.pagination-controls');
    }
}
