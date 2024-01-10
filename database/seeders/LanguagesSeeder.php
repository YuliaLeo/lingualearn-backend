<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguagesSeeder extends Seeder
{
    public function run(): void
    {
        $languages = [
            ['name' => 'English'],
            ['name' => 'Mandarin Chinese'],
            ['name' => 'Hindi'],
            ['name' => 'Spanish'],
            ['name' => 'French'],
            ['name' => 'Standard Arabic'],
            ['name' => 'Bengali'],
            ['name' => 'Russian'],
            ['name' => 'Portuguese'],
            ['name' => 'Indonesian'],
        ];

        DB::table('languages')->insert($languages);
    }
}
