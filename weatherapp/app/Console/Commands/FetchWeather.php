<?php

namespace App\Console\Commands;

use App\Models\WeatherData;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use App\Console\Commands\FetchWeatherCity;
use Illuminate\Support\Facades\Log;

class FetchWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch all data from weather api';

    
    protected $cities = ["Tokyo", "Skopje", "Strumica", "London", "New York"];

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $WeatherData = [];
        foreach ($this->cities as $city) {
            $this->info('Fetching weather for ' . $city);
            Artisan::call('weather:fetchByCity', ['city' => $city]);
            $output = Artisan::output();
            $WeatherData[$city] = $output;
            Log::info('Output for ' . $city . ': ' . $output);
        }
        foreach ($WeatherData as $city) {
            $this->line($city);
        }
    }
}
