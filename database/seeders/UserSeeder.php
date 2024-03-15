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
        $name = ['admin', 'ksk', 'participant'];
        $email = ['admin@itc.com','ksk@itc.com','participant@itc.com'];

        foreach ($name as $key => $value) {
            User::create([
                'name' => $value,
                'email' => $email[$key],
                'password' => bcrypt('password'),
            ])->assignRole($value);
        }
    }
}
