<?php

namespace Database\Seeders;

use App\Models\Members;
use App\Models\Teams;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $team_id = Teams::all();
        $faker = \Faker\Factory::create();
        foreach ($team_id as $key => $value) {
            for ($i = 0; $i <= $value['total_members']; $i++) {
                Members::create([
                    'team_id' => $value['id'],
                    'full_name' => $faker->name,
                    'university_id' => random_int(1, 10),
                    'ktm_path' => 'ktm.jpg',
                    'active_certificate' => 'active_sertificate.jpg',
                    'member_role' => $i == 0 ? 'ketua' : 'anggota',
                ]);
            }
        }
        
    }
}
