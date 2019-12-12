<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\Schema;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        //Category::truncate();
        Category::create(['name' => 'Phim hành động']);
        Category::create(['name' => 'Phim kinh dị']);
        Category::create(['name' => 'Phim tâm lý']);
        Schema::enableForeignKeyConstraints();
    }
}
