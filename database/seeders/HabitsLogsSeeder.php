<?php

namespace Database\Seeders;

use App\Models\HabitsLogs;
use Illuminate\Database\Seeder;

class HabitsLogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HabitsLogs::factory(2)->create();
    }
}
