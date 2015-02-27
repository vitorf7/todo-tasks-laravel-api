<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use LaravelTodo\User;

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->truncate();

        User::create(array(
            'name'      => 'Vitor Faiante',
            'email'     => 'vitor.faiante@madebypartners.com',
            'password'  => Hash::make('passwordsecret')
        ));

        $faker = Factory::create();

        for ($i = 0; $i < 100; $i++) {

            User::create(array(
                'name'      => $faker->name,
                'email'     => $faker->email,
                'password'  => Hash::make('password')
            ));

        }

    }

}