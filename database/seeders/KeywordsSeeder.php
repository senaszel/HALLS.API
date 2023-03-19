<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Keyword;
use Illuminate\Database\Seeder;

class KeywordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\Keyword::factory(10)->create();

        Keyword::factory()->withName('Weselna')->withType('Uroczystości')->create();
        Keyword::factory()->withName('Urodzinowa')->withType('Uroczystości')->create();
        Keyword::factory()->withName('Rocznica')->withType('Uroczystości')->create();
        Keyword::factory()->withName('Sportowa')->withType('Sportowa')->create();
    }
}
