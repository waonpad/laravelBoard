<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 20; $i++) {
            $array[] = [
                'name' => 'admin' . $i,
                'email' => 'admin' . $i . '@example.com',
                'password' =>  Hash::make('admin' . $i),
                'created_at' => now()->addMinutes($i),
            ];
        }

        DB::table('users')->insert($array);
    }
}
