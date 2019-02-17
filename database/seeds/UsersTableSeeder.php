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
            'organization_name' => 'SPEC',
            'organization_address' => 'SPEC',
            'telephone_number' => 'SPEC',
            'phone_number' => 'SPEC',
            'password' => bcrypt('111111'),
            'role' => 'super_admin',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);



    }
}
