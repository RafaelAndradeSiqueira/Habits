<?php

namespace Database\Seeders;

use App\Models\Habits;
use Illuminate\Database\Seeder;

class HabitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Habits::factory(1)->create();
    }
}
