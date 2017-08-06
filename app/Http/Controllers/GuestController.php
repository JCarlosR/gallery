<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function show($username)
    {
        // User::where('username', $username)->first();
        return "Hola $username";
    }
}
