<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Engineering'],
            ['name' => 'Accountant'],
            ['name' => 'Information Technology'],
            ['name' => 'Fashion Design'],
            ['name' => 'IT/Company'],
        ]; 
        Category::insert($data);
        
    }
}
