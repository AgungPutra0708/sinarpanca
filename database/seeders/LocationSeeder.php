<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('locations')->insert([
            [
                'head_office' => 'Jl. Panjang Blok A14 No.44 , Kedoya Utara, Kebon Jeruk, Jakarta Barat, DKI Jakarta',
                'branch_office' => 'Jl. Kediri no.9H Tuban, Kuta Bali',
                'maps' => 'https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Jl.%20Panjang%20Blok%20A14%20No.44%20,%20Kedoya%20Utara,%20Kebon%20Jeruk,%20Jakarta%20Barat,%20DKI%20Jakarta+(PT%20Sinar%20Panca)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed',
            ],
        ]);
    }
}
