<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelsSeeder extends Seeder
{
    public function run(): void
    {
        $levels = [
            ['name' => 'Beginner', 'short_name' => 'А1'],
            ['name' => 'Elementary', 'short_name' => 'А2'],
            ['name' => 'Pre-Intermediate/Intermediate', 'short_name' => 'B1'],
            ['name' => 'Upper Intermediate', 'short_name' => 'B2'],
            ['name' => 'Advanced', 'short_name' => 'C1'],
            ['name' => 'Proficient', 'short_name' => 'C2'],
        ];

        DB::table('levels')->insert($levels);
    }
}
