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
            'next_repetition_time' => $this->faker->dateTime,
            'folder_id' => $this->faker->numberBetween(1, 3),
        ];
    }
}
