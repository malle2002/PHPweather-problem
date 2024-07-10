<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherDataController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/api/weather', WeatherDataController::class)->parameters(['weather' => 'city']);
