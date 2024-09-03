<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function download($filename)
    {
        // Decode the filename back to its original form
        $decodedFilename = urldecode($filename);
        $filePath = public_path('download/' . $decodedFilename);
    
        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            return redirect()->back()->with('error', 'File not found!');
        }
    }
}
