<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class MacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        Http::macro('openWeather', function($city) {
          return Http::get('https://api.openweathermap.org/data/2.5/weather', [
            'q' => $city,
            'appid' => config('openweather.api_key')
          ]);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
