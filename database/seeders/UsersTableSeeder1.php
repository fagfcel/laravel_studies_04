<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder1 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1 - add user directly
        DB::table('users')->insert([
            'username' => 'User1',
            'password' => bcrypt('senha'),
            'active' => true
        ]);
    }
}
