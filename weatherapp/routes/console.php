<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('weather:fetch2', function () {
    // Command logic to fetch weather data goes here
    $this->info('Fetching weather data...');
})->purpose('Fetch weather data')->everyFiveMinutes();