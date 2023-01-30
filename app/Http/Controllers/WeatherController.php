<?php

namespace App\Http\Controllers;

use App\Models\Weather;
use App\Services\WeatherService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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

    public function store(Request $request, WeatherService $weatherService)
    {
        $response = $weatherService->searchWeather($request->input('city'));

        return redirect()->route('weathers.show', [
          'weather' => $response->id
        ]);
    }
}
