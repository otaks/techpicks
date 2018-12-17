<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Socialite\Two\FacebookProvider as SocialiteFacebookProvider;

class FacebookServiceProvider extends SocialiteFacebookProvider
{
    protected function getUserByToken($token)
    {
        $meUrl = $this->graphUrl.'/'.$this->version.'/me?access_token='.$token.
            '&fields='.implode(',', $this->fields).((\App::getLocale() === 'ja') ? '&locale=ja_JP' : '');
        if (! empty($this->clientSecret)) {
            $appSecretProof = hash_hmac('sha256', $token, $this->clientSecret);
            $meUrl .= '&appsecret_proof='.$appSecretProof;
        }
        $response = $this->getHttpClient()->get($meUrl, [
            'headers' => [
                'Accept' => 'application/json',
            ],
        ]);
        return json_decode($response->getBody(), true);
    }
}
