<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [];
        for ($i = 1; $i < 20; $i++) {
            $array[] = [
                'post_id' => $i,
                'category_id' => random_int(1, 4)
            ];
        }

        DB::table('category_post')->insert($array);
    }
}
