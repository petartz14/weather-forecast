<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeatherRequest;
use App\Models\Weather;
use App\Services\WeatherService;
use Exception;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
  public function index()
  {
    return inertia('Weathers/Index', [
      'weathers' => Weather::all()
    ]);
  }

  public function show(Weather $weather)
  {
    return inertia('Weathers/Show', [
      'weather' => $weather
    ]);
  }

    public function searchWeather()
    {
      return inertia('Weathers/SearchWeather');
    }

    public function store(WeatherRequest $request, WeatherService $weatherService)
    {
        try
        {
            $response = $weatherService->searchWeather($request->input('search'));

            return redirect()->route('weathers.show', [
              'weather' => $response->id
            ]);
        } catch (Exception $e)
        {
          return redirect()->back()->withErrors(['message' => 'The city not found']);
        }
    }
}
