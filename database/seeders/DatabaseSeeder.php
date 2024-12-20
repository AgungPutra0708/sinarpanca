<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AboutSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(HomeSeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(UserSeeder::class);
    }
}
