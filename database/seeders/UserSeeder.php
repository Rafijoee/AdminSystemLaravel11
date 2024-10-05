<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $name = ['admin', 'participant'];
        $email = ['admin@itc.com','user@gmail.com'];

        foreach ($name as $key => $value) {
            User::create([
                'name' => $value,
                'email' => $email[$key],
                'password' => bcrypt('password'),
            ])->assignRole($value);
        }
    }
}
