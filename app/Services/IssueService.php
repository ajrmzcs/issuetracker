<?php

namespace App\Services;

use App\Models\Issue;
use Exception;
use Illuminate\Pagination\LengthAwarePaginator;

class IssueService
{
    public function listAll(): LengthAwarePaginator
    {
        return Issue::paginate();
    }


    public function store(array $attributes): bool
    {
        try {
            Issue::create($attributes);
            return true;
        } catch (Exception $e) {
            // @TODO: Log exception
            return false;
        }
    }

    public function update(Issue $issue, array $attributes): bool
    {
        try {
            $issue->update($attributes);
            return true;
        } catch (Exception $e) {
            // @TODO: Log exception
            return false;
        }
    }
}
