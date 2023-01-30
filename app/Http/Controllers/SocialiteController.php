<?php

namespace App\Http\Controllers;

use App\Services\GithubSocialiteService;
use Illuminate\Http\Request;

class SocialiteController extends Controller
{
    public function githubRedirect(GithubSocialiteService $githubSocialiteService)
    {
        return $githubSocialiteService->redirect();
    }

    public function githubCallback(GithubSocialiteService $githubSocialiteService)
    {
        return $githubSocialiteService->callback();
    }
}
