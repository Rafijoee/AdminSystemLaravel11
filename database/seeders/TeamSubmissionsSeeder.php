<?php

namespace Database\Seeders;

use App\Models\Teams;
use App\Models\TeamSubmissions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSubmissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $team_id = Teams::all()->pluck('id')->toArray();
        
        foreach ($team_id as $id) {
            TeamSubmissions::create([
                'team_id' => $id,
                'stage_id' => random_int(1,4),

            ]);
        }
    }
}
