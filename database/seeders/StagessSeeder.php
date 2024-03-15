<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\Stages;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StagessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categgory_id = Categories::all()->pluck('id')->toArray();
        $stages = ['pesnyisihan', 'semifinal', 'final'];
        
        foreach ($categgory_id as $key => $value) {
            foreach ($stages as $stage) {
                Stages::create([
                    'name' => $stage,
                    'category_id' => $value,
                    'description' => 'Tahap ' . $stage . ' ' . $value . ' ' . 'Idea IT Competition 2021',

                ]);
            }
            
        }
    }
}
