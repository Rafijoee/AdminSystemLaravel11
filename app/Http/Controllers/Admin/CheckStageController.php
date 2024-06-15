<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Stages;
use App\Models\Teams;
use App\Models\TeamSubmissions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckStageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $stages1 = Teams::whereIn('stage_id', [1, 4, 7, 10])->get();
        $stages2 = Teams::whereIn('stage_id', [2, 5, 8, 11])->get();
        $stages3 = Teams::whereIn('stage_id', [3, 6, 9, 12])->get();
        

        return view('admin.checkstage.index', compact('stages1', 'stages2', 'stages3'));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     */
    public function show(Teams $teams, $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $team = Teams::findOrFail($id);
        return view ('admin.checkstage.update', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Teams::where('id', $id)->update([
            'stage_id' => $request->stage,
            'verified_status' => $request->verification,
        ]);

        TeamSubmissions::where('id', $id)->update([
            'stage_id' => $request->stage,
        ]);
    
        $team = Teams::findOrFail($id); // Tidak perlu memuat ulang data tim
    
        return redirect()->route('checkstage.index')->with('success', 'Data tim ' . $team->team_name . ' telah diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
