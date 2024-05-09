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

        return view('Users\submisson1\index', compact('categorys_id'));
    }

    public function store(Request $request)
    {
        $directory = public_path('submission1');
        if (!File::isDirectory($directory)) {
            File::makeDirectory($directory, 0777, true, true);
        }
        try {
            // Validasi request
            $validator = $request->validate([
                'submission1' => 'required|mimes:pdf|max:5120',
            ]);

            if ($request->hasFile('submission1')) {
                $file = $request->file('submission1');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('submission1'), $fileName);

                // Simpan data submission ke database
                $submission = new TeamSubmissionsDetails();
                $submission->path = 'submission1/' . $fileName;
                $submission->save();

                return response()->json(['message' => 'File berhasil diupload'], 200);
            } else {
                return response()->json(['error' => 'File tidak ditemukan'], 400);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal mengupload proposal');
        }
    }
}
