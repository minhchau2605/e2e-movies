<?php

use Illuminate\Database\Seeder;
use App\Models\Movie;
use Illuminate\Support\Facades\Schema;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Movie::truncate();
        Movie::create(
            [
                'name_movie' => 'Avengers: Endgame',
                'release_date' => '2019-04-22',
                'type' => '1',
                'number_of_episodes' => 1,
                'length' => 190,
                'quality' => '1080p',
                'subtitle' => 'Phụ đề',
                'view' => 0,
                'status' => 1,
                'user_rating' => 5,
                'imdb_score' => 8.0,
            ]);
        Schema::enableForeignKeyConstraints();
    }
}
