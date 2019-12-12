<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('director_id')->unsigned()->nullable();
            $table->integer('company_id')->unsigned()->nullable();
            $table->integer('country_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('thumbnail')->nullable();
            $table->string('trailer_url')->nullable();
            $table->date('release_date')->nullable();
            $table->string('type');
            $table->integer('number_of_episodes')->nullable();
            $table->integer('update_episode')->nullable();
            $table->integer('length')->nullable();
            $table->string('quality')->nullable();
            $table->string('subtitle')->nullable();
            $table->integer('view')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->integer('user_rating')->nullable();
            $table->float('imdb_score')->nullable();
            $table->float('aw_score')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
