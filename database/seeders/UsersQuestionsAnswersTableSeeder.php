<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersQuestionsAnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(5)->create()->each(function($user){
            $user->questions()->saveMany(
                \App\Models\Question::factory(rand(1, 5))->create()->make()
            )->each(function($q){
                $q->answers()->saveMany(factory(App\Models\Answer::class, rand(1, 5))->make());
            });
        });
    }
}

