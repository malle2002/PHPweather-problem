<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\WeatherData;

class WeatherDataControllerTest extends TestCase
{
    /** @test */
    public function test_return_all_weather_data()
    {
        $response = $this->get('/api/weather');
        $response->assertStatus(200)
                 ->assertJsonCount(5);
    }

    /** @test */
    public function test_return_specific_weather_data()
    {
        $response = $this->get('/api/weather/' . "Strumica");

        $response->assertStatus(200)
                 ->assertJson([
                     'city' => 'Strumica',
                 ]);
    }

    /** @test */
    public function test_returns_404_if_weather_data_not_found()
    {
        $response = $this->get('/api/weather/unknown-city');

        $response->assertStatus(404)
                 ->assertJson([
                     'error' => 'Weather data not found'
                 ]);
    }
}
