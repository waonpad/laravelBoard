<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $catgories = [
            'React',
            'Vue',
            'Angular',
            'TypeScript'
        ];

        $array = [];

        foreach ($catgories as $category) {
            $array[] = [
                'category' => $category
            ];
        }

        DB::table('categories')->insert($array);
    }
}
