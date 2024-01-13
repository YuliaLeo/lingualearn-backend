<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UsersWordFactory extends Factory
{
    public function definition(): array
    {
        return [
            'word' => $this->faker->word,
            'translation' => $this->faker->word,
            'next_show_at' => $this->faker->dateTime,
            'correct_count' => $this->faker->numberBetween(0, 6),
            'incorrect_count' => $this->faker->numberBetween(0, 6),
            'folder_id' => $this->faker->numberBetween(1, 3),
        ];
    }
}
