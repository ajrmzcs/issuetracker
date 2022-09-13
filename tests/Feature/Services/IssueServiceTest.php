<?php

namespace Tests\Feature\Services;

use App\Models\Issue;
use App\Models\Status;
use App\Models\User;
use App\Services\IssueService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IssueServiceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_an_issue()
    {
        $service = new IssueService();

        $user = User::factory()->create();
        $status = Status::factory()->create();

        $attributes = [
            'title' => 'title',
            'description' => 'description',
            'user_id' => $user->id,
            'status_id' => $status->id,
        ];

        $result = $service->store($attributes);

        self::assertTrue($result);
        self::assertDatabaseHas('issues', $attributes);
    }

    /** @test */
    public function it_lists_paginated_issues()
    {
        $service = new IssueService();

        $users = User::factory()->count(2)->create();
        $statuses = Status::factory()->count(2)->create();

        $attributes1 = [
            'title' => 'title 1',
            'description' => 'description',
            'user_id' => $users[0]->id,
            'status_id' => $statuses[0]->id,
        ];

        $attributes2 = [
            'title' => 'title 2',
            'description' => 'description',
            'user_id' => $users[1]->id,
            'status_id' => $statuses[1]->id,
        ];

        $service->store($attributes1);
        $service->store($attributes2);

        $result = $service->listAll();

        self::assertCount(2, $result->all());
        self::assertDatabaseHas('issues', $attributes1);
        self::assertDatabaseHas('issues', $attributes2);
        self::assertInstanceOf(LengthAwarePaginator::class, $result);
        self::assertArrayHasKey('from', $result->toArray());
        self::assertArrayHasKey('to', $result->toArray());

    }

    /** @test */
    public function it_updates_an_issue()
    {
        $service = new IssueService();

        $user = User::factory()->create();
        $status = Status::factory()->create();

        $attributes = [
            'title' => 'title',
            'description' => 'description',
            'user_id' => $user->id,
            'status_id' => $status->id,
        ];

        $service->store($attributes);

        $issue = Issue::first();

        $attributes['title'] = 'Edited title';

        $result =$service->update($issue, $attributes);

        self::assertTrue($result);
        self::assertDatabaseHas('issues', $attributes);
    }
}
