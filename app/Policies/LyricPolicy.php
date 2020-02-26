<?php

namespace App\Policies;

use App\Models\Lyric;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LyricPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, Lyric $lyric)
    {
        //
        return  $lyric->status != 1 && $user->id === $lyric->user_id;
    }

    public function delete(User $user, Lyric $lyric)
    {
        //
        return $lyric->status != 1 && $user->id === $lyric->user_id;
    }
}
