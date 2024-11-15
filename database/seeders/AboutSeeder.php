<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('abouts')->insert([
            [
                'vision' => '<p>
                                To be the leading construction company that sets the
                                benchmark for innovation, quality, and sustainability in
                                Indonesia.
                            </p>',
                'mission' => "<ul>
                                <li>To deliver construction services with a focus on quality, integrity, and safety.</li>
                                <li>To build lasting relationships with clients by exceeding their expectations through
                                    collaboration and trust.</li>
                            </ul>",
                'description' => "<p>
                                PT Sinar Panca, with over 10 years of experience, we have made a significant contribution to
                                providing high-quality public infrastructure. Driven by our values of innovation, integrity,
                                and sustainability, we ensure quality and efficiency standards in every project. We don't
                                just build structures, we create legacies that contribute to national progress.
                            </p>",
            ]
        ]);
    }
}
