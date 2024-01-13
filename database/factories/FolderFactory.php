<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FolderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'user_id' => 1,
            'language_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
