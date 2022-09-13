<?php

namespace Tests\Feature\Console\Commands;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MakeUserAminTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_promotes_an_existing_user_to_admin()
    {
        $user = User::factory()->create();

        self::assertDatabaseHas('users', ['email' => $user->email, 'is_admin' => false]);

        $this->artisan("user:admin $user->email");

        self::assertDatabaseHas('users', ['email' => $user->email, 'is_admin' => true]);
    }

    /** @test */
    public function it_aborts_when_user_does_not_exists()
    {
        $this->artisan('user:admin not-and-user@example.com')
            ->expectsOutput('User: not-and-user@example.com not found, Aborting...')
            ->assertExitCode(1);
    }
}
