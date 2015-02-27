<?php

use Illuminate\Database\Seeder;
use LaravelTodo\Task;

class TasksTableSeeder extends Seeder {

    public function run()
    {
        DB::table('tasks')->truncate();

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 300; $i++) {

            Task::create(array(
                'user_id'       => (int) $faker->numberBetween(1, 101),
                'title'         => (string) $faker->sentence(3),
                'description'   => (string) $faker->realText(100)
            ));

        }

    }

}