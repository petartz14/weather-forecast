<?php

use App\Http\Controllers\LogoutController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['guest'])->group(function () {
    Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
});

Route::get('auth/github', [SocialiteController::class, 'githubRedirect'])->name('auth.github');
Route::get('auth/github/callback', [SocialiteController::class, 'githubCallback'])->name('auth.github.callback');

Route::middleware(['auth'])->group(function () {
    Route::get('/weathers', [WeatherController::class, 'index'])->name('weathers.index');
    Route::post('/weathers', [WeatherController::class, 'store'])->name('weathers.store');
    Route::get('/weathers/search', [WeatherController::class, 'searchWeather'])->name('weathers.searchWeather');
    Route::get('/weathers/{weather}', [WeatherController::class, 'show'])->name('weathers.show');

    Route::post('logout', [LogoutController::class, 'index'])->name('logout');
}
);