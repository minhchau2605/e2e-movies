<?php

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
        $this->call(ActorsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(MoviesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
