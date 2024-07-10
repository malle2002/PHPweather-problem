<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeatherData extends Model
{
    protected $table = 'weather_data';
    protected $fillable = ['city', 'temperature', 'humidity', 'description'];
}
