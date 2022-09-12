<?php

namespace App\Http\Livewire;

use App\Models\User;

class UsersTable extends Sortable
{
    public string $sortField = 'users.name';

    public function render()
    {
        $users = User::search($this->search)
            ->select(
                'id', 'name', 'email', 'avatar', 'is_admin', 'created_at'
            )
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);

        return view('livewire.users-table', compact('users'));
    }
}
