<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\MovieCollection;
use App\Models\Movie;

class MovieController extends Controller
{
    public function showMovieManager(){
        //$movies = Movie::getAllMoviePaginate();
        return view('admin.pages.movies.movie');
        //return new MovieCollection(Movie::all());
    }

    /**
     * List movie
     * @return MovieCollection
     */
    public function listMovie(){
        return new MovieCollection(Movie::all());
    }

    /**
     * Detail movie
     */
    public function detailMovie(){

    }
}
