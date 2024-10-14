<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Call the LessonsSeeder
        $this->call(LessonsSeeder::class);
        $this->call(LevelsSeeder::class);
    }
}
