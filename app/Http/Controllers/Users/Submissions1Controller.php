<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\TeamSubmissions;
use App\Models\Teams;
use App\Models\TeamSubmissionsDetails;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreProfileRequest;
use App\Models\Categories;
use App\Models\Members;
use App\Models\Universities;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;


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
            $validator = Validator::make($request->all(), [
                'submission1' => 'required|mimes:pdf|max:5120',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 400);
            }

            if ($request->hasFile('submission1')) {
                $file = $request->file('submission1');
                $path = $request->file('submission1')->store('submission1');
                // dd(Auth::user()->teams->team_submissions->id);
                // dd(Auth::user()->teams?->team_submission->first()->id);
                // dd(teams::with('team_submissions'));
                // dd(TeamSubmissions::all());
                $submission = [
                    'team_submissions_id' => Auth::user()->teams?->team_submission->first()->id,
                    'submissions_type_id' => 1,
                    'path' => $path 
                ];
                $create = TeamSubmissionsDetails::create($submission);
                // $submission = new TeamSubmissionsDetails;
                // $submission->path = 'submission1/' . $fileName;
                // $submission->team_submissions_id = Auth::user()->teams->team_submissions->id;
                // $submission->type = 1; 
                // $submission->save();

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
