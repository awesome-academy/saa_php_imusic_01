<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Song;
use App\Models\User;
use App\Models\Rate;

class FavouriteList extends Model
{
    protected $table = "favourite_lists";
    
    public function songs()
    {
        return $this->morphToMany(Song::class, 'listable');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rates()
    {
        return $this->morphMany(Rate::class, 'rateable');
    }
}
