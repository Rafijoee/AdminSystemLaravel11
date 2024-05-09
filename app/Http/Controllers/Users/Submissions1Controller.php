<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
;

class Submissions1Controller extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $categorys_id = $user->teams->team_submission;

        return view('Users\submisson1\index', compact('categorys_id'));
    }

    public function store (Request $request){

    }
}
