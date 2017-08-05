<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class TwitterLoginController extends Controller
{

    public function redirectToProvider()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function handleProviderCallback()
    {
        $twitterUser = Socialite::driver('twitter')->user();

        $user = User::where('twitter_id', $twitterUser->getId())->first();
        if (!$user)
            $user = new User();

        $user->twitter_id = $twitterUser->getId();
        $user->name = $twitterUser->getName();
        $user->email = $twitterUser->getEmail();
        $user->social_image = $twitterUser->getAvatar();
        $user->password = '';
        $user->save();

        Auth::login($user);
        return redirect('/home');
    }

}
