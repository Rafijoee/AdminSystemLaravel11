<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProfileRequest;
use App\Models\Categories;
use App\Models\Members;
use App\Models\Teams;
use App\Models\Universities;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProfilesController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $team = Teams::where('user_id', $user_id)->first();
        if (!$team) {
            return redirect()->route('profile.create');
        }
        $members = $team->members;
        
        return view('users.profile.index', compact('team', 'members'));
    }

    public function create(){
        $categories = Categories::all();
        $universities = Universities::all();
        return view('users.profile.form',compact('categories','universities'));
    }

    public function store(StoreProfileRequest $request)
    {

        if($request->name_anggota_3){
            $total_members = 3;
        }else{
            $total_members = 2;
        }
        
        DB::beginTransaction();
        try {
            $teams = Teams::create([
                'team_name' => $request->team_name,
                'phone' => $request->phone,
                'category_id' => $request->category_id,
                'university_id' => $request->university_id,
                'user_id' => Auth::id(),
                'total_members' => $total_members,
                'stage_id' => 1,
            ]);

            for($i=1; $i<=$total_members; $i++){

                $univ = $request['univ_anggota_'.$i];
                $name = $request['name_anggota_'.$i];
                $ktm_path = $request->file('ktm_anggota_'.$i)->store('ktm_anggota_'.$i);
                $active_path = $request->file('active_anggota_'.$i)->store('active_anggota_'.$i);
                Members::create([
                    'team_id' => $teams->id,
                    'full_name' => $name,
                    'university_id' => $univ,
                    'ktm_path' => $ktm_path,
                    'active_certificate' => $active_path,
                    'member_role' => $i==1 ? 'ketua' : 'anggota',
                ]);
            }
            DB::commit();
        
        }catch (\Exception $e){
            DB::rollBack();
            dd($e);
            return redirect()->back()->with('error', 'Gagal membuat tim');
        }


        function uploadFile($file,$request){
            $patch = $request->file($file)->store($file);
            return $patch;
        }


    }

    public function edit($id)
    {
        $team = Teams::find($id);
        $categories = Categories::all();
        $universities = Universities::all();
        return view('users.profile.form',compact('team','categories','universities'));
    }

    public function update($id, StoreProfileRequest $request)
    {
        $team = Teams::find($id);
        $team->update([
            'team_name' => $request->team_name,
            'phone' => $request->phone,
            'category_id' => $request->category_id,
            'university_id' => $request->university_id,
        ]);

        $team->members()->delete();
        if($request->name_anggota_2){
            $total_members = 3;
        }else{
            $total_members = 2;
        }

        for($i=1; $i<=$total_members; $i++){
            $univ = $request['univ_anggota_'.$i];
            $name = $request['name_anggota_'.$i];
            $ktm_path = $request->file('ktm_anggota_'.$i)->store('ktm_anggota_'.$i);
            $active_path = $request->file('active_anggota_'.$i)->store('active_anggota_'.$i);
            Members::create([
                'team_id' => $team->id,
                'full_name' => $name,
                'university_id' => $univ,
                'ktm_path' => $ktm_path,
                'active_certificate' => $active_path,
                'member_role' => $i==1 ? 'ketua' : 'anggota',
            ]);
        }

        return redirect()->route('profile.index')->with('success', 'Berhasil mengubah tim');

    }



    
}
