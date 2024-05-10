<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\TeamSubmissionsDetails;
use App\Models\User;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class Submissions1Controller extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $categorys_id = $user->teams->team_submission;

        return view('users\submisson1\index', compact('categorys_id'));
    }

    public function store(Request $request)
    {
        $directory = public_path('submission1');
        if (!File::isDirectory($directory)) {
            File::makeDirectory($directory, 0777, true, true);
        }
        try {
            $validator = $request->validate([
                'submission1' => 'required|mimes:pdf|max:5120',
            ]);

            if ($request->hasFile('submission1')) {
                $file = $request->file('submission1');
                $teamName = Auth::user()->teams->firstOrFail()->team_name;
                $fileName = time() . '_' . $teamName . '_' . $file->getClientOriginalName();
                $file->move(public_path('submission1'), $fileName);

                $submission = new TeamSubmissionsDetails();
                $submission->path = 'submission1/' . $fileName;
                $submission->team_submissions_id = Auth::user()->teams->team_submissions->id;
                $submission->type = 1; 
                $submission->save();

                return redirect()->route('dashboard');
            } else {
                return response()->json(['error' => 'File tidak ditemukan'], 400);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal mengupload proposal');
        }
    }
}
