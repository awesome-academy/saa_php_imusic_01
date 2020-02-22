<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use App\Services\SocialUserService;

class SocialController extends Controller
{
    public function redirect($social)
    {
        return Socialite::driver($social)->redirect();
    }

    public function callback($social)
    {
        $user = SocialUserService::createOrGetUser(Socialite::driver($social)->user(), $social);
        auth()->login($user);

        return redirect()->to('/');
    }
}
