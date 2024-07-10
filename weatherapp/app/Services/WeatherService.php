<?php

namespace App\Services;

use GuzzleHttp\Client;

class WeatherService{

    protected $client;
    protected $cities;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.openweathermap.org/data/2.5/weather',
            'verify' => false,
        ]);
        
    }

    public function getWeatherCity(string $city)
    {
        $apiKey = config('services.openweathermap.key');
        $response = $this->client->get('weather', [
            'query' => [
                'q' => $city,
                'appid' => $apiKey,
                'units' => 'metric',
            ]
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}