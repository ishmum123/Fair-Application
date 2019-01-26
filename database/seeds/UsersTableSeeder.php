<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Super admin seeding
        DB::table('users')->insert([
            'name' => 'Super Admin',
            'email' => 'super@gmail.com',
            'password' => bcrypt('111111'),
            'role' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);


        //admin seeding

        DB::table('users')->insert([
            'name' => 'Admin A',
            'email' => 'admina@gmail.com',
            'password' => bcrypt('222222'),
            'role' => 2,
            'is_active' =>1,
            'district_id' =>1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Admin B',
            'email' => 'adminb@gmail.com',
            'password' => bcrypt('222222'),
            'role' => 2,
            'is_active' =>1,
            'district_id' =>20,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);


        //users seeding
        DB::table('users')->insert([
            'name' => 'User A',
            'email' => 'usera@gmail.com',
            'password' => bcrypt('333333'),
            'role' => 3,
            'is_active' =>1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'User B',
            'email' => 'userb@gmail.com',
            'password' => bcrypt('333333'),
            'role' => 3,
            'is_active' =>1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
