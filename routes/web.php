<?php

use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\WeatherController;
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

Route::get('/', function () {
    return inertia('Welcome');
});

Route::get('auth/github', [SocialiteController::class, 'githubRedirect'])->name('auth.github');
Route::get('auth/github/callback', [SocialiteController::class, 'githubCallback'])->name('auth.github.callback');

Route::middleware(['auth'])->group(function () {
  Route::get('/weathers', [WeatherController::class, 'index'])->name('weathers.index');
}
);