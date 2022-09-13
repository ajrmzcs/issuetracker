<?php

namespace Tests\Feature\Controllers;

use App\Models\Status;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IssueControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function an_authenticated_user_can_see_issues_list_view()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $this->get('/issues')->assertOk()->assertViewIs('issues.index');
    }

    /** @test */
    public function an_unauthenticated_user_cannot_see_issues()
    {
        $this->get('/issues')->assertRedirect('login');
    }

    /** @test */
    public function an_authenticated_user_can_add_an_issue()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $this->get('/issues/create')
            ->assertOk()
            ->assertViewIs('issues.create')
            ->assertSee('Create Issue');

    }

    /** @test */
    public function an_unauthenticated_user_cannot_add_an_issue()
    {
        $this->get('/issues/create')
            ->assertRedirect('login');
    }

    /** @test */
    public function an_authenticated_user_can_store_an_issue()
    {
        $user = User::factory()->create();
        $status = Status::factory()->create();
        $this->actingAs($user);

        $attributes = [
            'title' => 'title',
            'description' => 'description',
            'user_id' => $user->id,
            'status_id' => $status->id,
        ];

        $this->post('/issues', $attributes)
            ->assertRedirect('issues');

        $this->assertDatabaseHas('issues', $attributes);
    }
}
