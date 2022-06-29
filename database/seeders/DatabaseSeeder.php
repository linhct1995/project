<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        DB::table('admin_user')->insert([
            "name" => "cao linh",
            "email"=> "linhcao@gmail.com" ,
            "password" => Hash::make(123456) ,
            "type" => 1
        ]);
    }
}
