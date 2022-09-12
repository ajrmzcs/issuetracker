<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::insert([
            [
                'name' => 'pending',
                'color' => 'amber',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'in progress',
                'color' => 'green',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'blocked',
                'color' => 'red',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'in review',
                'color' => 'purple',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'done',
                'color' => 'blue',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
