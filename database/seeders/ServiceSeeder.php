<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->insert([
            [
                'name_service' => 'Project Management',
                'picture' => 'project.png',
            ],
            [
                'name_service' => 'Construction Management',
                'picture' => 'worker.png',
            ],
            [
                'name_service' => 'Contructor MEP, Structure and Architect',
                'picture' => 'workers.png',
            ],
        ]);
    }
}
