<?php

namespace Database\Seeders;

use App\Models\Universities;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class universitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $universities = [
            ['name' => 'Universitas Indonesia', 'domain' => 'ui.ac.id'],
            ['name' => 'Institut Teknologi Bandung', 'domain' => 'itb.ac.id'],
            ['name' => 'Universitas Gadjah Mada', 'domain' => 'ugm.ac.id'],
            ['name' => 'Universitas Airlangga', 'domain' => 'unair.ac.id'],
            ['name' => 'Universitas Brawijaya', 'domain' => 'ub.ac.id'],
            ['name' => 'Universitas Diponegoro', 'domain' => 'undip.ac.id'],
            ['name' => 'Universitas Padjadjaran', 'domain' => 'unpad.ac.id'],
            ['name' => 'Universitas Hasanuddin', 'domain' => 'unhas.ac.id'],
            ['name' => 'Universitas Sumatera Utara', 'domain' => 'usu.ac.id'],
            ['name' => 'Universitas Negeri Malang', 'domain' => 'um.ac.id'],
            ['name' => 'Universitas Negeri Yogyakarta', 'domain' => 'uny.ac.id'],
            ['name' => 'Universitas Negeri Semarang', 'domain' => 'unnes.ac.id'],
            ['name' => 'Universitas Negeri Surabaya', 'domain' => 'unesa.ac.id'],
            ['name' => 'Universitas Negeri Medan', 'domain' => 'unimed.ac.id'],
            ['name' => 'Universitas Negeri Padang', 'domain' => 'unp.ac.id'],
            ['name' => 'Universitas Negeri Makassar', 'domain' => 'unm.ac.id'],
            ['name' => 'Universitas Negeri Yogyakarta', 'domain' => 'uny.ac.id'],
            ['name' => 'Universitas Negeri Semarang', 'domain' => 'unnes.ac.id'],
            ['name' => 'Universitas Negeri Surabaya', 'domain' => 'unesa.ac.id'],
            ['name' => 'Universitas Negeri Medan', 'domain' => 'unimed.ac.id'],
            ['name' => 'Universitas Negeri Padang', 'domain' => 'unp.ac.id'],
            ['name' => 'Universitas Negeri Makassar', 'domain' => 'unm.ac.id'],
            ['name' => 'Universitas Negeri Malang', 'domain' => 'um.ac.id'],
            ['name' => 'Universitas Negeri Yogyakarta', 'domain' => 'uny.ac.id'],
            ['name' => 'Universitas Negeri Semarang', 'domain' => 'unnes.ac.id'],
            ['name' => 'Universitas Negeri Surabaya', 'domain' => 'unesa.ac.id'],
            ['name' => 'Universitas Negeri Medan', 'domain' => 'unimed.ac.id'],
            ['name' => 'Universitas Negeri Padang', 'domain' => 'unp.ac.id'],
            ['name' => 'Universitas Negeri Makassar', 'domain' => 'unm.ac.id'],
            ['name' => 'Universitas Negeri Malang', 'domain' => 'um.ac.id'],
            
            
        ];
        foreach ($universities as $university) {
            Universities::create([
                'university_name' => $university['name'],
                'domain' => $university['domain'],
            ]);
        }
    }
}
