<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'name' => 'root',
            'email' => 'root@example.com',
            'password' =>  Hash::make('root'),
            'created_at' => now(),
        ];

        DB::table('users')->insert($user);
    }
}
