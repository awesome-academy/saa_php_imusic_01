<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\FavouriteList;
use App\Models\Category;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Comment;
use App\Models\Rate;
use App\Models\Lyric;

class Song extends Model
{
    protected $table = 'songs';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function favouriteList()
    {
        return $this->morphedByMany(FavouriteList::class, 'listable');
    }
    public function albums()
    {
        return $this->morphedByMany(Album::class, 'listable');
    }
    public function artists()
    {
        return $this->morphedByMany(Artist::class, 'listable');
    }
    
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function rates()
    {
        return $this->morphMany(Rate::class, 'rateable');
    }

    public function lyrics()
    {
        return $this->hasMany(Lyric::class);
    }

    public function lyric()
    {
        return $this->belongsTo(Lyric::class);
    }

    public function getImageAttribute($value)
    {
        $value = url('images/') . $value;
        return $value;
    }
}
