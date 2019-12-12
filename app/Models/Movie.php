<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table = 'movies';

    protected $fillable = [
        'director_id',
        'company_id',
        'country_id',
        'name',
        'release_date',
        'type',
        'number_of_episodes',
        'update_episode',
        'length',
        'quality',
        'subtitle',
        'view',
        'status',
        'user_rating',
        'imdb_score',
        'aw_score',
    ];
}
