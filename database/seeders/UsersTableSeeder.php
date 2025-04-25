<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1 - add user directly
        // DB::table('users')->insert([
        //     'username' => 'User1',
        //     'password' => bcrypt('senha'),
        //     'active' => true
        // ]);
        
        //2 add more users
        // $Users = [
        //     [
        //         'username' => 'User2',
        //         'password' => bcrypt('senha')
        //     ],
        //     [
        //         'username' => 'User3',
        //         'password' => bcrypt('senha')
        //     ],
        //     [
        //         'username' => 'User4',
        //         'password' => bcrypt('senha')
        //     ]

        // ];
        // DB::table('users')->insert($Users);

        //3 add users with random data
        $users = [];
        for($index = 0; $index < 10; $index++){
            $users[] = [
                'username' => Str::random(10),
                'password' => bcrypt('senha'),
                'active' => (bool) rand(0,1)
            ];
        }
        DB::table('users')->insert($users);

    }
}
