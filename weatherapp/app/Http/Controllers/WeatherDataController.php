<?php

namespace App\Http\Controllers;

use App\Models\WeatherData;
use Illuminate\Http\Request;

class WeatherDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $weatherData = WeatherData::all();
        return response()->json($weatherData);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($city)
    {
        try {
            $weatherData = WeatherData::where('city', $city)->first();
            if(!$weatherData){
                return response()->json(['error' => 'Weather data not found'], 404);
            }
            return response()->json($weatherData);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Weather data not found'], 404);
        }
        
    }
}
