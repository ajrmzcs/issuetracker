<?php

namespace App\Http\Livewire;

use App\Models\Category;

class CategoriesTable extends Sortable
{
    public string $sortField = 'name';

    public function render()
    {
        $categories = Category::search($this->search)
            ->select(
                'id', 'name', 'created_at'
            )
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);

        return view('livewire.categories-table', compact('categories'));
    }
}
