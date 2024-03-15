<?php

namespace Database\Seeders;

use App\Models\SubmissionDetails;
use App\Models\SubmissionsTypes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubmissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $proposal_id = SubmissionsTypes::where('name', 'proposal')->first()->id;
        // $prototype_id = SubmissionsTypes::where('name', 'prototype')->first()->id;
        // $video_id = SubmissionsTypes::where('name', 'video')->first()->id;
        // $ppt_id = SubmissionsTypes::where('name', 'ppt')->first()->id;
        // $source_code_id = SubmissionsTypes::where('name', 'source code')->first()->id;
        // $poster_id = SubmissionsTypes::where('name', 'poster')->first()->id;

        $submission = ([
            ['submissions_type_id' => $proposal_id, 'stage_id' => '1'],
            ['submissions_type_id' => $proposal_id, 'stage_id' => '2'],
            ['submissions_type_id' => $proposal_id, 'stage_id' => '3'],
            ['submissions_type_id' => $proposal_id, 'stage_id' => '4'],
        ]);

        foreach ($submission as $sub) {
            SubmissionDetails::create($sub);
        }
        
    }
}
