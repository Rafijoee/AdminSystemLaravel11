<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Payments;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users\payment\index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    $directory = public_path('paymentsub2');

    if (!File::isDirectory($directory)) {
        File::makeDirectory($directory, 0777, true, true);
    }

    if ($request->hasFile('paymentsub')) {
        DB::beginTransaction();
        try {
            $team_name = Auth::user()->teams->team_name;
            $directory = 'paymentsub2/'; // Direktori tujuan

            $file = $request->file('paymentsub');
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = $team_name . '.' . $fileExtension;

            $paymentsub_path = $file->storeAs(
                $directory,
                $fileName,
                'public'
            );

            $team_id = Auth::user()->teams->id;
            $stage_id = Auth::user()->teams->stage_id;
            $status = 'unverified';

            // Simpan data pembayaran ke database
            $attributes = [
                'team_id' => $team_id,
                'stage_id' => $stage_id
            ];

            $values = [
                'payment_path' => $paymentsub_path,
                'status' => $status
            ];

            $payment = Payments::updateOrCreate($attributes, $values);

            DB::commit();

            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            DB::rollBack();
            // Tampilkan pesan kesalahan untuk debugging
            return redirect()->back()->with('error', 'Gagal upload file pembayaran: ' . $e->getMessage());
        }
    } else {
        return redirect()->back()->with('error', 'File pembayaran tidak ditemukan');
    }
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
