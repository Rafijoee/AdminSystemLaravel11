<?php

namespace Database\Seeders;

use App\Models\Teams;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TeamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    
        $faker = Faker::create();
        $user_id = User::role('participant')->pluck('id')->toArray();
        
        foreach ($user_id as $id) {
            Teams::create([
                'user_id' => $id,
                'team_name' => 'Team ' . $id,
                'phone' => $faker->phoneNumber,
                'stage_id' => 1,
                'verified_status' => 'unverified',
                'category_id' => random_int(1, 4),
                'total_members' => random_int(2, 3),                
            ]);
        }
    }
}
