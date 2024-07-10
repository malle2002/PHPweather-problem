<?php

namespace App\Console\Commands;

use App\Models\WeatherData;
use Illuminate\Console\Command;
use App\Services\WeatherService;

class FetchWeatherCity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:fetchByCity {city}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch weather information for specific city';


    protected $weatherService;
    /**
     * Initialize weatherService to a instance of WeatherService
     */
    public function __construct(WeatherService $weatherService)
    {
        parent::__construct();
        $this->weatherService = $weatherService;
    }

    public function handle()
    {
        $city = $this->argument('city');
        $weatherData = $this->weatherService->getWeatherCity($city);

        $this->info('Weather in ' . $city . ':');
        $this->table(['Time', 'Temperature', 'Humidity', 'Description'], [[
            now()->format('Y-m-d H:i:s'),
            $weatherData['main']['temp'] . ' °C',
            $weatherData['main']['humidity'] . ' %',
            $weatherData['weather'][0]['description'],
        ]]);
        $temperature = $weatherData['main']['temp'] ?? null;
        $humidity = $weatherData['main']['humidity'] ?? null;
        $description = $weatherData['weather'][0]['description'] ?? null;
        $this->info('Fetching weather for ' . $temperature);
        $this->info('Fetching weather for ' . $humidity);
        $this->info('Fetching weather for ' . $description);
        WeatherData::updateOrCreate(
            ['city' => $city],
            [
                'temperature' => $temperature,
                'humidity' => $humidity,
                'description' => $description,
            ]
        );
    }
}
