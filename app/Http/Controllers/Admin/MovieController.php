<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;

class MovieController extends Controller
{
    /**
     * Show mall manager
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showMovieManager(){
        $movies = Movie::getAllMoviePaginate();
        return view('admin.pages.movies.movie', compact('movies'));
    }
}
