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
            'id' => 1,
            'name' => 'Barcelona',
            'country_code' => 'ES',
            'latitude' => 41.3874,
            'longitude' => 2.1686,
        ]);

        DB::table('locations')->insert([
            'id' => 2,
            'name' => 'Berlin',
            'country_code' => 'DE',
            'latitude' => 52.5200,
            'longitude' => 13.4050,
        ]);

        DB::table('locations')->insert([
            'id' => 3,
            'name' => 'Stettin',
            'country_code' => 'PL',
            'latitude' => 53.4285,
            'longitude' => 14.5528,
        ]);
    }
}
