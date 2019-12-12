<?php

use Illuminate\Database\Seeder;
use App\Models\Actor;
use Illuminate\Support\Facades\Schema;

class ActorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Actor::truncate();
        Actor::create(
            [
                'name' => 'Robert Downey Jr.',
                'birthday' => '1965/4/4',
                'height' => 174,
                'gender' => 1,
            ]);
        Schema::enableForeignKeyConstraints();
    }
}
