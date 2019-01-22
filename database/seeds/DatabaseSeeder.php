<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

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

//        $ary = ['Super Admin', 'Admin', 'Kabir Hasan'];
//
//        DB::table('users')->insert([
//            'name' => $ary[0],
//            'email' => 'super@gmail.com',
//            'password' => bcrypt('111111'),
//            'role' => 1,
//            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//        ]);
//
//        DB::table('users')->insert([
//            'name' => $ary[1],
//            'email' => 'admin@gmail.com',
//            'password' => bcrypt('222222'),
//            'role' => 2,
//            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//        ]);
//
//
//        DB::table('users')->insert([
//            'name' => $ary[2],
//            'email' => 'kabir@gmail.com',
//            'password' => bcrypt('333333'),
//            'role' => 3,
//            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//        ]);


        DB::table('users')->insert([
            'name' => 'Super Admin',
            'email' => 'super@gmail.com',
            'password' => bcrypt('111111'),
            'role' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        $districts = ["Barguna", "Barisal","Bhola","Jhalokati","Patuakhali","Pirojpur",
                    "Bandarban","Brahmanbaria",   "Chandpur", "Chittagong", "Comilla",
                    "Cox's Bazar","Feni",     "Khagrachhari","Lakshmipur", "Noakhali", "Rangamati",
                    "Dhaka",    "Faridpur",       "Gazipur",  "Gopalganj",  "Kishoreganj","Madaripur",
                    "Manikganj","Munshiganj",  "Narayanganj", "Narsingdi", "Rajbari", "Shariatpur","Tangail",
                    "Bagerhat", "Chuadanga",      "Jessore",  "Jhenaidah",  "Khulna",     "Kushtia",    "Magura",
                    "Meherpur",    "Narail",     "Satkhira",
                    "Jamalpur", "Mymensingh",     "Netrakona","Sherpur",
                    "Bogra",    "Chapainawabganj","Joypurhat","Naogaon", "Natore","Pabna", "Rajshahi", "Sirajganj",
                    "Dinajpur", "Gaibandha",      "Kurigram", "Lalmonirhat","Nilphamari", "Panchagarh", "Rangpur",
                    "Thakurgaon",
                    "Habiganj", "Moulvibazar",    "Sunamganj","Sylhet"];
        for($i = 0; $i < 64; $i++){
            if($districts[$i] == 'Barisal' || $districts[$i] == 'Chittagong' || $districts[$i] == 'Chittagong'
                || $districts[$i] == 'Dhaka' || $districts[$i] == 'Khulna' || $districts[$i] == 'Mymensingh'
                || $districts[$i] == 'Rajshahi' || $districts[$i] == 'Rangpur' || $districts[$i] == 'Sylhet'){
                $isDivision = 1;
            }
            else $isDivision = 0;
            DB::table('districts')->insert([
                'name' => $districts[$i],
                'isDivision' => $isDivision,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }



    }
}
