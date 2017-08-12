<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function show($username)
    {
        $user = User::where('username', $username)->first();
        if (!$user)
            return redirect('/');

        $galleries = $user->galleries()->with(['photos' => function ($query) {
            $query->select(['file_name', 'name', 'description', 'gallery_id']);
        }])->get();
        // Gallery::where('user_id', $user->id)->get();

        // Book::all();
        // Book::with('author')->get();

        return view('guest.user.profile')->with(compact('user', 'galleries'));
    }
}
