<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Issue;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = Status::all();
        $categories = Category::all();

        User::factory()
            ->count(20)
            ->create()
            ->each(
                fn ($user) =>
                Issue::factory()
                    ->state(new Sequence(
                        fn ($sequence) => [
                            'status_id' => $statuses->random()->id,
                        ]
                    ))
                    ->count(10)
                    ->create([
                        'user_id' => $user->id,
                    ])
                    ->each(
                        fn ($issue) => $issue->categories()->attach($categories->random(2)->pluck('id'))
                    )
            );

        User::factory()->create([
            'name' => 'App Admin',
            'email' => 'admin@admin.com'
        ]);
    }
}
