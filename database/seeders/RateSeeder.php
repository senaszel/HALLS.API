<?php

namespace Database\Seeders;

use App\Models\Advertisement;
use App\Models\Rate;
use Database\Factories\RateFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Advertisement::all() as $advertisement) {
            Rate::factory(5)->forAdvertisement($advertisement)->create();
        };
    }
}
