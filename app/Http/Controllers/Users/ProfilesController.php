<?php

namespace App\Http\Controllers\Users;

use App\Models\Teams;
use App\Models\Stages;
use App\Models\Members;
use App\Models\Categories;
use App\Models\Universities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Cache\Store;
use App\Models\TeamSubmissionsDetails;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProfileRequest;
use App\Models\TeamSubmissions;

class ProfilesController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user()->id;
        $team = Teams::where('user_id', $user)->first();
        $member = Members::where('team_id', $team?->id)->get();
        $universities = Universities::all();
        $category = $team?->category?->category_name;
        $status = Auth()->user()?->teams?->verified_status;
        $captain = $member->where('member_role', 'ketua')->first();
        $university = $universities->where('id', $captain?->university_id)->first();
        $anggotas = $member->where('member_role', 'anggota');
        if ($anggotas->count() == 0) {
            $anggotas = null;
        }
        if ($member->count() == 0) {
            $member = null;
        }
        $stage = Stages::where('id', $team?->stage_id)->first();

        return view('dashboard.index', compact('member', 'university', 'captain', 'team', 'anggotas', 'stage', 'status', 'category'));
    }

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

    public function create()
    {
        $categories = Categories::all();
        $universities = Universities::all()->sortByDesc('name');
        $team = null;
        $members = null;
        return view('users.profile.form', compact('categories', 'universities', 'team', 'members'));
    }

    public function show($id)
    {
        $team = Teams::find($id);
        $members = Members::where('team_id', $team->id)->get();
        $univ = $members->first()?->universitas;
        $categories = Categories::all();
        $universities = Universities::all();
        return view('users.profile.form', compact('team', 'categories', 'universities', 'members', 'univ'));
    }

    public function store(StoreProfileRequest $request)
    {
        $total_members = $request->name_anggota_3 ? 3 : 2;

        $category_stage_map = [
            1 => 1,
            2 => 4,
            3 => 7,
            4 => 10
        ];
        $stage_id = isset($category_stage_map[$request->category_id]) ? $category_stage_map[$request->category_id] : null;

        DB::beginTransaction();
        try {
            $team = Teams::create([
                'team_name' => $request->team_name,
                'phone' => $request->phone,
                'category_id' => $request->category_id,
                'verified_status' => 'unverified', // 'pending', 'verified', 'rejected
                'user_id' => Auth::id(),
                'total_members' => $total_members,
                'stage_id' => $stage_id,
            ]);

            for ($i = 1; $i <= $total_members; $i++) {
                $univ = $request->univ;
                $name = $request['name_anggota_' . $i];
                $ktm_path = $request->file('ktm_anggota_' . $i)->store($request->team_name . '/ktm');
                $active_path = $request->file('active_anggota_' . $i)->store($request->team_name . '/active');
                Members::create([
                    'team_id' => $team->id,
                    'full_name' => $name,
                    'universitas' => $request->univ,
                    'ktm_path' => $ktm_path,
                    'active_certificate' => $active_path,
                    'member_role' => $i == 1 ? 'ketua' : 'anggota',
                ]);
            }
            $team_submission = TeamSubmissions::create([
                'team_id' => $team->id,
                'stage_id' => $stage_id,
            ]);
            DB::commit();
            return redirect('dashboard')->with('success', 'Tim berhasil dibuat!');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Gagal membuat tim');
        }
    }


    public function edit($id)
    {
        $team = Teams::find($id);
        $team_id = $team->id;
        $members = Members::where('team_id', $team_id)->get();
        $univ = $members->first()?->universitas;
        $categories = Categories::all();
        $universities = Universities::all();
        return view('users.profile.edit', compact('team', 'categories', 'universities', 'members', 'univ'));
    }

    public function update($id, StoreProfileRequest $request)
    {
        $team = Teams::findOrFail($id);
        $total_members = $request->name_anggota_3 ? 3 : 2;
        $category_stage_map = [
            1 => 1,
            2 => 4,
            3 => 7,
            4 => 10
        ];
        $stage_id = isset($category_stage_map[$request->category_id]) ? $category_stage_map[$request->category_id] : null;

        DB::beginTransaction();
        try {
            $team::update([
                'team_name' => $request->team_name,
                'phone' => $request->phone,
                'category_id' => $request->category_id,
                'total_members' => $total_members,
                'stage_id' => $stage_id,
            ]);

            for ($i = 1; $i <= $total_members; $i++) {
                $member = Members::where('team_id', $team->id)->skip($i - 1)->first();

                $univ = $request['univ'];
                $name = $request['name_anggota_' . $i];

                $ktm_path = $member->ktm_path;
                if ($request->hasFile('ktm_anggota_' . $i)) {
                    $ktm_path = $request->file('ktm_anggota_' . $i)->store($request->team_name . '/ktm');
                }

                $active_path = $member->active_certificate;
                if ($request->hasFile('active_anggota_' . $i)) {
                    $active_path = $request->file('active_anggota_' . $i)->store($request->team_name . '/active');
                }

                $member::update([
                    'full_name' => $name,
                    'universitas' => $univ,
                    'ktm_path' => $ktm_path,
                    'active_certificate' => $active_path,
                ]);
                dd($member);
            }

            DB::commit();
            return redirect()->with('success', 'Tim berhasil diperbarui!');
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal memperbarui tim');
        }
    }
}
