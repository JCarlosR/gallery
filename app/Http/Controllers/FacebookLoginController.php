<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FacebookLoginController extends Controller
{

    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallback()
    {
        $facebookUser = Socialite::driver('facebook')->user();

        $user = User::where('facebook_id', $facebookUser->getId())->first();
        if (!$user)
            $user = new User();

        $user->facebook_id = $facebookUser->getId();
        // $facebookUser->getNickname();
        $user->name = $facebookUser->getName();
        $user->email = $facebookUser->getEmail();
        $user->social_image = $facebookUser->getAvatar();
        $user->password = '';
        $user->save();

        Auth::login($user);
        return redirect('/home');
    }

}
