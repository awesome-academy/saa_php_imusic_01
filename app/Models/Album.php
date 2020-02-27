<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Song;

class Album extends Model
{
    protected $table = 'albums';
    protected $fillable = ['name', 'is_hot'];

    public function songs()
    {
        return $this->morphToMany(Song::class, 'listable');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function getImageAttribute($value)
    {
        $value = url('web/images/') . "/$value";
        return $value;
    }
}
