<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Song;

class Album extends Model
{
    protected $table = 'albums';

    public function songs()
    {
        return $this->morphToMany(Song::class, 'listable');
    }

    public function getImageAttribute($value)
    {
        $value = 'public\images\\' . $value;
        return $value;
    }
}
