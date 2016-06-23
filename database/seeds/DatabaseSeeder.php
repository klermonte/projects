<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'first_name' => 'test',
            'email' => 'test@test.test',
            'password' => bcrypt('123123'),
        ]);
        App\User::create([
            'first_name' => 'test2',
            'email' => 'test2@test.test',
            'password' => bcrypt('123123'),
        ]);
    }
}
