@extends('layouts.base')

@section('body')
<nav class="navbar navbar-expand bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Weather Forecasts</a>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Locations
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('weather.forecast', ['countryCode' => 'PL', 'city' => 'Stettin']) }}">Stettin</a></li>
                        <li><a class="dropdown-item" href="{{ route('weather.forecast', ['countryCode' => 'ES', 'city' => 'Barcelona']) }}">Barcelona</a></li>
                        <li><a class="dropdown-item" href="{{ route('weather.forecast', ['countryCode' => 'DE', 'city' => 'Berlin']) }}">Berlin</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    @yield('content')
</div>
@endsection
