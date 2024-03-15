<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index()
    {
        $profile = auth()->user()->profile;
        return view('users.profiles.index', compact('profile'));
    }
}
