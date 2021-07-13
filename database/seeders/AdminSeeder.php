<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Mr.Admin',
            'email' => 'admin@1.com',
            'role_id' => '1',
            'password' => bcrypt('admin'),

        ]);

        
    }
}
