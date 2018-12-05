<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Socialite;

class SocialController extends Controller
{
    public function signin()
    {
        return view('auth/signin');
    }

    public function login()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver('facebook')->user();
        dd($user);
    }
}
