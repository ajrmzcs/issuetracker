<?php

namespace App\Http\Livewire;

use App\Models\Status;

class StatusesTable extends Sortable
{
    public string $sortField = 'name';

    public function render()
    {
        $statuses = Status::search($this->search)
            ->select(
                'id', 'name', 'color', 'created_at'
            )
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);

        return view('livewire.statuses-table', compact('statuses'));
    }
}
