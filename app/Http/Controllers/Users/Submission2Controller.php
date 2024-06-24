<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\TeamSubmissionsDetails;
use App\Models\TeamSubmissions;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class Submission2Controller extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $can = $user->teams->stage_id;
        if ($can != 2) {
            return redirect()->route('dashboard')->with('error', 'Anda tidak bisa mengakses halaman tersebut!');
        }
        $fileOnUpload = Auth::user()->teams?->team_submission?->first()->path_1;
        $categorys_id = $user->teams->team_submission;

        return view('users\submisson2\index', compact('categorys_id', 'fileOnUpload'));
    }
    public function store(Request $request)
    {
        // Membuat direktori jika belum ada
        $directory = public_path('submission2');
        if (!File::isDirectory($directory)) {
            File::makeDirectory($directory, 0777, true, true);
        }

        try {
            // Validasi input dengan pesan khusus
            $validator = Validator::make($request->all(), [
                'submission2' => 'required|mimes:zip|max:5120',
            ], [
                'submission2.required' => 'The submission file is required.',
                'submission2.mimes' => 'The submission file must be a ZIP file.',
                'submission2.max' => 'The submission file size must not exceed 5MB.',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            if ($request->hasFile('submission2')) {
                $team_id = Auth::user()->teams->firstOrFail()->id;
                $fileOnUpload = Auth::user()->teams?->team_submission?->first()->path_2;

                if (isset($fileOnUpload) && Auth::user()->teams?->team_submission->first()->path_3 != "") {
                    if (file_exists($fileOnUpload)) {
                        unlink($fileOnUpload);
                    }
                }

                $file = $request->file('submission2');
                $teamName = Auth::user()->teams->firstOrFail()->team_name;
                $fileName = time() . '_' . $teamName . '_' . $file->getClientOriginalName();
                $fileLocation = 'submission2/' . Auth::user()->teams?->category?->category_name . '/';
                $file->move(public_path($fileLocation), $fileName);

                $path = $fileLocation . $fileName;
                TeamSubmissions::where('team_id', $team_id)->update(['path_2' => $path]);

                return redirect()->route('dashboard')->with('success', 'Anda terhasil mengupload proposal');
            } else {
                return response()->json(['error' => 'File tidak ditemukan'], 400);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal mengupload proposal');
        }
    }
}
