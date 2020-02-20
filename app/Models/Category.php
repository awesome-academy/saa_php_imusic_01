<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Song;

class Category extends Model
{
    protected $table = 'categories';

    public function songs()
    {
        return $this->hasMany(Song::class, 'category_id');
    }
}
