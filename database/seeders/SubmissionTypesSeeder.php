<?php

namespace Database\Seeders;

use App\Models\SubmissionsTypes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubmissionTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tpe = ([['name' => 'proposal' , 'type' => 'pdf'],
                ['name' => 'prototype' , 'type' => 'link'],
                ['name' => 'video' , 'type' => 'link'],
                ['name' => 'ppt' , 'type' => 'pdf'],
                ['name' => 'source code' , 'type' => 'link'],
                ['name' => 'poster' , 'type' => 'img']]);
        
        foreach ($tpe as $type) {
            SubmissionsTypes::create($type);
        }

    }
}
