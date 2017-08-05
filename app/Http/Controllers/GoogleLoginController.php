<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleLoginController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        $user = User::where('google_id', $googleUser->getId())->first();
        if (!$user)
            $user = new User();

        $user->google_id = $googleUser->getId();
        // $googleUser->getNickname();
        $user->name = $googleUser->getName();
        $user->email = $googleUser->getEmail();
        $user->social_image = $googleUser->getAvatar();
        $user->password = '';
        $user->save();

        Auth::login($user);
        return redirect('/home');
    }

}
