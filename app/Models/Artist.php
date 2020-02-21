<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Song;

class Artist extends Model
{
    protected $table = 'artists';

    public function songs()
    {
        return $this->morphToMany(Song::class, 'listable');
    }

    public function getAvatarAttribute($value)
    {
        $value = 'public\images\\' . $value;
        return $value;
    }
}
