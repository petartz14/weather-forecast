<?php

namespace App\Services;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GithubSocialiteService
{
  public function redirect()
  {
    return Socialite::driver('github')->redirect();
  }

  public function callback()
  {
    try {
        $user = Socialite::driver('github')->user();

        $newUser = User::where('github_id', $user->id)->first();
  
        if(!$newUser){
          $newUser = User::create([
              'name' => $user->name,
              'email' => $user->email,
              'github_id'=> $user->id,
              'github_url'=> $user->user['url'],
              'password' => encrypt('password')
          ]);
        }

        Auth::login($newUser);

        return redirect()->route('weathers.searchWeather');
 
    } catch (Exception $e) {
        return $e->getMessage();
    }
  }
}