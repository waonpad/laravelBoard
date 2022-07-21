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

        // ToDo: categoriesテーブルに入れるテストデータを作成
    }
}
