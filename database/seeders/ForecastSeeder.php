<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ForecastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('forecasts')->insert([
            'date' => '2024-01-01',
            'location_id' => 1,
            'temperature_celsius' => 23,
            'fl_temperature_celsius' => 25,
            'pressure' => 1009,
            'humidity' => 49,
            'wind_speed' => 7.7,
            'wind_deg' => 90,
            'cloudiness' => 0,
            'icon' => 'sun',
        ]);

        DB::table('forecasts')->insert([
            'date' => '2024-01-02',
            'location_id' => 1,
            'temperature_celsius' => 20,
            'fl_temperature_celsius' => 17,
            'pressure' => 999,
            'humidity' => 70,
            'wind_speed' => 3.2,
            'wind_deg' => 45,
            'cloudiness' => 75,
            'icon' => 'cloud',
        ]);

        DB::table('forecasts')->insert([
            'date' => '2024-01-03',
            'location_id' => 1,
            'temperature_celsius' => 21,
            'fl_temperature_celsius' => 22,
            'pressure' => 1025,
            'humidity' => 40,
            'wind_speed' => 0.7,
            'wind_deg' => 0,
            'cloudiness' => 25,
            'icon' => 'cloud-sun',
        ]);




        DB::table('forecasts')->insert([
            'date' => '2024-01-01',
            'location_id' => 2,
            'temperature_celsius' => 11,
            'fl_temperature_celsius' => 9,
            'pressure' => 989,
            'humidity' => 92,
            'wind_speed' => 1,
            'wind_deg' => 180,
            'cloudiness' => 75,
            'icon' => 'cloud-rain',
        ]);

        DB::table('forecasts')->insert([
            'date' => '2024-01-02',
            'location_id' => 2,
            'temperature_celsius' => 10,
            'fl_temperature_celsius' => 10,
            'pressure' => 1000,
            'humidity' => 50,
            'wind_speed' => 3.2,
            'wind_deg' => 90,
            'cloudiness' => 75,
            'icon' => 'cloud',
        ]);

        DB::table('forecasts')->insert([
            'date' => '2024-01-03',
            'location_id' => 2,
            'temperature_celsius' => 15,
            'fl_temperature_celsius' => 15,
            'pressure' => 1025,
            'humidity' => 40,
            'wind_speed' => 0.7,
            'wind_deg' => 0,
            'cloudiness' => 25,
            'icon' => 'cloud-sun',
        ]);




        DB::table('forecasts')->insert([
            'date' => '2024-01-01',
            'location_id' => 3,
            'temperature_celsius' => 11,
            'fl_temperature_celsius' => 9,
            'pressure' => 989,
            'humidity' => 92,
            'wind_speed' => 1,
            'wind_deg' => 180,
            'cloudiness' => 75,
            'icon' => 'cloud-rain',
        ]);

        DB::table('forecasts')->insert([
            'date' => '2024-01-02',
            'location_id' => 3,
            'temperature_celsius' => 10,
            'fl_temperature_celsius' => 10,
            'pressure' => 1000,
            'humidity' => 50,
            'wind_speed' => 3.2,
            'wind_deg' => 90,
            'cloudiness' => 75,
            'icon' => 'cloud',
        ]);

        DB::table('forecasts')->insert([
            'date' => '2024-01-03',
            'location_id' => 3,
            'temperature_celsius' => 15,
            'fl_temperature_celsius' => 15,
            'pressure' => 1025,
            'humidity' => 40,
            'wind_speed' => 0.7,
            'wind_deg' => 0,
            'cloudiness' => 25,
            'icon' => 'cloud-sun',
        ]);
    }
}
