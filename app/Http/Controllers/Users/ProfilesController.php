<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Teams;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $teams = Teams::where('user_id', $user_id)->first();
        return view('users.profile.index', compact('teams'));
    }

    public function store(Request $request)
    {
        $profile = auth()->user()->profile;
        $profile->update($request->all());
        return redirect()->back();
    }

    public function form(){
        $categories = Categories::all();
        return view('users.profile.form',compact('categories'));
    }
}
