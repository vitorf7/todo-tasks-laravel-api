<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

        // Users Table
		$this->call('UserTableSeeder');
        $this->command->info('Users table seeded');

        // Tasks Table
        $this->call('TasksTableSeeder');
        $this->command->info('Tasks Table seeded');

	}

}
