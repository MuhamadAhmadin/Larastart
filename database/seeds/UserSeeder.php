<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');

        DB::table('users')->insert([
            'role_id' => 1,
            'name' => 'Admin',
            'username' => 'admin',
            'password' => bcrypt('654321'),
            'email' => 'admin@gmail.com',
            'about' => 'Hello, this is admin bio',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'role_id' => 2,
            'name' => 'Staff',
            'username' => 'staff',
            'password' => bcrypt('123456'),
            'email' => 'staff@gmail.com',
            'about' => 'Hi, this is staff bio',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
