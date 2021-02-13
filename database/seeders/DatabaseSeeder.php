<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\VotableTableSeeder;
use Database\Seeders\FavouritesTableSeeder;
use Database\Seeders\UsersQuestionsAnswersTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersQuestionsAnswersTableSeeder::class,
            FavouritesTableSeeder::class,
            VotableTableSeeder::class
        ]);
    }
}
