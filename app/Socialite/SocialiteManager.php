<?php
namespace App\Socialite;

use Laravel\Socialite\SocialiteManager as LaravelSocialiteManager;

class SocialiteManager extends LaravelSocialiteManager
{
    protected function createFacebookDriver()
    {
        $config = $this->app['config']['services.facebook'];
        return $this->buildProvider(
            'App\Providers\FacebookServiceProvider', $config
        );
    }
}