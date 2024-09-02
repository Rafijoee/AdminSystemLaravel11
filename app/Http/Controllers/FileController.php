<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function download($filename)
    {
        // Lokasi file di dalam storage
        $filePath = storage_path('app/public/' . $filename);

        // Cek apakah file ada
        if (file_exists($filePath)) {
            // Jika ada, download file
            return response()->download($filePath);
        } else {
            // Jika tidak ada, tampilkan error atau redirect
            return redirect()->back()->with('error', 'File not found!');
        }
    }
}

