<?php

namespace Database\Seeders;

use App\Models\JobType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Full-Time'],
            ['name' => 'Part-Time'],
            ['name' => 'Remote'],
            ['name' => 'Freelance']
        ]; 
        JobType::insert($data);
    }
}
