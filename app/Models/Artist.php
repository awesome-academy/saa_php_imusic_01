<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Song;
use Illuminate\Support\Facades\Config;

class Artist extends Model
{
    protected $table = 'artists';
    protected $fillable = ['name', 'dob', 'infomation', 'avatar'];

    public function songs()
    {
        return $this->morphToMany(Song::class, 'listable');
    }

    public function getAvatarAttribute($value)
    {
        $value = url(Config::get('constants.storage.image')) . "/$value";
        return $value;
    }

    public function getDobAttribute($value)
    {
        $data_format = date('d-m-Y', strtotime($value));
        return $data_format;
    }
}
