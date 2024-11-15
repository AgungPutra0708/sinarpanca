<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('companys')->insert([
            [
                'name' => 'PT SINAR PANCA',
                'motto' => '',
                'notelp' => '0815828169',
                'email' => 'ptsinarpanca@gmail.com',
                'logo' => 'logo.png',
            ],
        ]);
    }
}
