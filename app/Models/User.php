<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\SocialUser;
use App\Models\Rate;
use App\Models\Lyric;
use App\Models\FavouriteList;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function socialUser()
    {
        return $this->hasMany(SocialUser::class);
    }

    public function rates()
    {
        return $this->hasMany(Rate::class);
    }

    public function lyrics()
    {
        return $this->hasMany(Lyric::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function favouriteList()
    {
        return $this->hasOne(FavouriteList::class);
    }

    public function getAvatarAttibute($value)
    {
        if (!strpos($value, 'http')) {
            $value = url('images/') . $value;
        }
        return $value;
    }

    public function scopeLoginWeb()
    {
        return auth('web')->user();
    }
}
