<?php

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
        // $this->call(UsersTableSeeder::class);

        DB::table('users')->insert([
            'name' => 'Super Admin',
            'email' => 'super@gmail.com',
            'password' => bcrypt('111111'),
            'role' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'Admin One',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('222222'),
            'role' => 2
        ]);

        DB::table('users')->insert([
            'name' => 'Admin two',
            'email' => 'admin2@gmail.com',
            'password' => bcrypt('222222'),
            'role' => 2
        ]);

        DB::table('users')->insert([
            'name' => 'Kabir Hasan',
            'email' => 'kabir@gmail.com',
            'password' => bcrypt('333333'),
            'role' => 3
        ]);
        DB::table('users')->insert([
            'name' => 'Ishmum Khan',
            'email' => 'ishmum@gmail.com',
            'password' => bcrypt('333333'),
            'role' => 3
        ]);
        DB::table('users')->insert([
            'name' => 'Hasan',
            'email' => 'hasan@gmail.com',
            'password' => bcrypt('333333'),
            'role' => 3
        ]);

    }
}
