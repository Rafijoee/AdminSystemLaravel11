<?php

namespace Database\Seeders;

use App\Models\SubmissionsTypes;
use App\Models\TeamSubmissions;
use App\Models\TeamSubmissionsDetails;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSubmissionDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $team_submission = TeamSubmissions::all()->pluck('id')->toArray();
        $proposal = SubmissionsTypes::where('name', 'proposal')->first()->id;
        
        foreach ($team_submission as $id) {
            TeamSubmissionsDetails::create([
                'team_submissions_id' => $id,
                'submissions_type_id' => $proposal,
                'path' => 'path/to/file',
            ]);
        }
    }
}
