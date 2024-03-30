<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'PPL', 'code' => '01'],
            ['name' => 'KTI', 'code' => '02'],
            ['name' => 'BISTIK', 'code' => '03'],
            ['name' => 'UX', 'code' => '04'],
        ];
        foreach ($categories as $category) {
            Categories::create([
                'category_name' => $category['name'],
                'payment_code' => $category['code'],
            ]);
        }
    }
}
