<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $table = 'actors';

    protected $fillable = [
        'country_id',
        'name' ,
        'birthday',
        'height' ,
        'weight' ,
        'gender',
        'images' 
    ];

    public function movies() {
        return $this->belongsToMany('App\Models\Movies', 'actor_movie', 'movie_id', 'actor_id');
    }
}
