<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HabitsLogs>
 */
class HabitsLogsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'habits_id' => '1',
            'user_id' => '1',
            'completed_at' => fake()->dateTimeThisMonth(),
        ];
    }
}
