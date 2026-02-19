<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\HabitsSeeder;
use Database\Seeders\HabitsLogsSeeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

         $this->call([
            UserSeeder::class,
            HabitsSeeder::class,
            HabitsLogsSeeder::class,
        ]);
    }
}
