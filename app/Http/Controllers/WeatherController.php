<?php

namespace App\Http\Controllers;

use App\Models\Forecast;
use App\Models\Location;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class WeatherController extends Controller
{
    public function forecast(string $countryCode, string $city)
    {
        $location = Location::where('country_code', $countryCode)
            ->where('name', $city)
            ->first()
        ;
        if (!$location) {
            throw new NotFoundHttpException("Location not found");
        }

        $forecasts = Forecast::where('location_id', $location->id)
            ->where('date', '>', now())
            ->orderBy('date')
            ->get()
        ;

        return view('weather.forecast', [
            'location' => $location,
            'forecasts' => $forecasts,
        ]);
    }
}
