<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Payments;
use App\Models\Stages;
use App\Models\Teams;
use App\Models\TeamSubmissions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

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
        try {
            // Dekripsi ID
            $decryptedID = Crypt::decryptString($id);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            // Tangani kesalahan jika ID tidak dapat didekripsi
            return redirect()->back()->with('error', 'ID tidak valid.');
        }

        $team = Teams::find($decryptedID);
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
    
        return redirect()->back()->with('success', 'Data tim ' . $team->team_name . ' telah diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function kti()
    {
        $stages1 = Teams::Where('stage_id', 1)->get();
        $stages2 = Teams::Where('stage_id', 2)->get();
        $stages3 = Teams::Where('stage_id', 3)->get();
        return view('admin.checkstage.kti', compact('stages1', 'stages2', 'stages3'));
    }

    public function busplan()
    {
        $stages1 = Teams::Where('stage_id', 4)->get();
        $stages2 = Teams::Where('stage_id', 5)->get();
        $stages3 = Teams::Where('stage_id', 6)->get();
        return view('admin.checkstage.busplan', compact('stages1', 'stages2', 'stages3'));
    }
    public function ppl()
    {
        $stages1 = Teams::Where('stage_id', 7)->get();
        $stages2 = Teams::Where('stage_id', 8)->get();
        $stages3 = Teams::Where('stage_id', 9)->get();
        return view('admin.checkstage.ppl', compact('stages1', 'stages2', 'stages3'));
    }

    public function ux()
    {
        $stages1 = Teams::Where('stage_id', 10)->get();
        $stages2 = Teams::Where('stage_id', 11)->get();
        $stages3 = Teams::Where('stage_id', 12)->get();
        return view('admin.checkstage.ux', compact('stages1', 'stages2', 'stages3'));
    }


    public function search(Request $request){
        $query = Teams::query();
    
        if ($request->has('search')) {
            $teams = Teams::where('team_name', 'like', "%".$request->search."%")->get();
        } else {
            $teams = Teams::all();
        }
    
        if($request->has('category') && $request->category != ''){
            $query->where('category', $request->category);
        }
        
        $stages1 = Teams::Where('stage_id', [1, 4, 7, 10])->get();
        $stages2 = Teams::Where('stage_id', [2, 5, 8, 11])->get();
        $stages3 = Teams::Where('stage_id', [3, 6, 9, 12])->get();

        $teams = $query->get();
    
        return view('admin.checkstage.index', compact('teams', 'stages1', 'stages2', 'stages3'));
    }
    
}
