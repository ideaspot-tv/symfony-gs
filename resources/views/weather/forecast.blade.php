@extends('layouts.layout_boxed')

@section('content')
    <div class="row mt-3">
        <div class="col">
            <h1>Forecast for {{ $location->name }}, {{ $location->country_code }}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div id="map" class="forecast-card mt-3" style="height: 180px;"></div>
        </div>
    </div>

    <div class="row forecasts mt-3">
        @foreach($forecasts as $forecast)
            <div class="col-12 col-lg-6">
                <div class="forecast-card">
                    <div class="row">
                        <div class="forecast-card-header col-xs-12 d-flex justify-content-between align-items-center">
                            <div class="day">{{ date('l', strtotime($forecast->date)) }}</div>
                            <div class="date">{{ date('d.m', strtotime($forecast->date)) }}</div>
                        </div>
                        <div class="forecast-card-general col-12 col-lg-6">
                            <div class="row">
                                <div class="col-6 text-center">
                                    <i class="bi-{{ $forecast->icon }} forecast-icon"></i>
                                </div>
                                <div class="col-6">
                                    <div class="temperature">{{ $forecast->temperature_celsius }}&deg;</div>
                                    <div class="fl-temperature">Feels like {{ $forecast->fl_temperature_celsius }}&deg;</div>
                                </div>
                            </div>
                        </div>
                        <div class="forecast-card-details col-12 col-lg-6 mt-3">
                            <dl>
                                <dt>Pressure</dt>
                                <dd>{{ $forecast->pressure }}</dd>

                                <dt>Humidity</dt>
                                <dd>{{ $forecast->humidity }}%</dd>

                                <dt>Wind</dt>
                                <dd>{{ $forecast->wind_speed }} m/s</dd>

                                <dt>Cloudiness</dt>
                                <dd>{{ $forecast->cloudiness }}%</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    <script>
        var map = L.map('map').setView([{{ $location->latitude }}, {{ $location->longitude }}], 10);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var marker = L.marker([{{ $location->latitude }}, {{ $location->longitude }}]).addTo(map);
    </script>
@endsection


@section('stylesheets')
    @parent
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
          crossorigin=""/>
@endsection


@section('javascripts')
    @parent

    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
            crossorigin=""></script>
@endsection
