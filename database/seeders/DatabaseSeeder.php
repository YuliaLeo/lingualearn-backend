<?php

namespace Database\Seeders;

use App\Models\Folder;
use App\Models\User;
use App\Models\UsersWord;
use Database\Factories\UsersWordFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            LevelsSeeder::class,
            LanguagesSeeder::class,
        ]);

        User::factory(1)
            ->has(Folder::factory(3))
            ->create();

        UsersWord::factory(10)->create();
    }
}
