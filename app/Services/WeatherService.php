<?php

namespace App\Services;

use App\Models\Weather as ModelsWeather;
use Exception;
use Illuminate\Support\Facades\Http;
use RakibDevs\Weather\Weather;

class WeatherService
{
    public function searchWeather($city)
    {
        try
        {
          $result = Http::openWeather($city);

          $newWeather = ModelsWeather::create([
                'name' => $result['name'],
                'date' => date('Y-m-d'),
                'temperature' => $result['main']['temp'],
                'description' => $result['weather'][0]['description'],
                'main' => $result['weather'][0]['main'],
                'pressure' => $result['main']['pressure'],
                'humidity' =>  $result['main']['humidity']
            ]);

            /** Through package */ 

            // $weather = new Weather();
            // $result = $weather->getCurrentByCity($city);

            // $newWeather = ModelsWeather::create([
            //     'name' => $result->name,
            //     'date' => date('Y-m-d'),
            //     'temperature' => $result->main->temp,
            //     'description' => $result->weather[0]->description,
            //     'main' => $result->weather[0]->main,
            //     'pressure' => $result->main->pressure,
            //     'humidity' =>  $result->main->humidity
            // ]);

            return $newWeather;
        } catch (Exception $e)
        {
            return $e;
        }
    } 
}