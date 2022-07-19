<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminsSeeder::class,
            UsersSeeder::class,
            UserContributionsSeeder::class,
            UserInfosSeeder::class,
            ContributionCategoriesSeeder::class,
            ContributionCategoryUserContributionSeeder::class,
        ]);
    }
}
