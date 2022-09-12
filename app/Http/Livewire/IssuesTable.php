<?php

namespace App\Http\Livewire;

use App\Models\Issue;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Livewire\Redirector;

class IssuesTable extends Sortable
{
    public ?int $deleteId;
    public string $sortField = 'issues.created_at';
    public bool $sortAsc = false;

    public function render()
    {
        $issues = Issue::search($this->search)
            ->select(
                'issues.id AS id', 'issues.title AS title', 'issues.description as description',
                'users.name AS user_name', 'statuses.name as status_name', 'statuses.color as status_color', 'issues.created_at AS created_at'
            )->join('users', 'issues.user_id', '=', 'users.id')
            ->join('statuses', 'issues.status_id', '=', 'statuses.id')
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);

        return view('livewire.issues-table', compact('issues'));
    }

    public function confirmDelete($id): void
    {
        $this->deleteId = $id;
    }

    public function destroy(Issue $issue): Redirector|RedirectResponse
    {
        if (! Gate::allows('update-delete-issue', $issue)) {
            session()->flash(
                'error',
                'You are not authorized to perform this action.'
            );
            return redirect()->route('issues.index');
        }


        try {
            $issue->delete();
            session()->flash(
                'success',
                "Issue successfully removed!"
            );
        } catch (QueryException $e) {
            session()->flash(
                'error',
                'There was a problem deleting the issue.'
            );
        }

        return redirect()->route('issues.index');
    }

    public function resetDelete(): void
    {
        $this->deleteId = null;
    }
}
