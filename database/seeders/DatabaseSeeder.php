<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'username' => 'root',
                'password' => 'toor',
                'role_id' =>1,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'User',
                'username' => 'user',
                'password' => 'user',
                'role_id' =>2,
                'created_at' => Carbon::now()

            ]
        ]);
    }
}
