<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

abstract class Sortable extends Component
{
    use WithPagination;

    public int $perPage = 10;
    public string $sortField = 'name';
    public bool $sortAsc = true;
    public string $search = '';

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = ! $this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }
}
