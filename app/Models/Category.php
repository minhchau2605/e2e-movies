<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name'
    ];

    public function movies() {
        return $this->belongsToMany('App\Models\Movies', 'category_movie', 'movie_id', 'category_id');
    }
}
