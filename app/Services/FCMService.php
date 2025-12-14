<?php

namespace App\Services;

use Google\Client as GoogleClient;
use Illuminate\Support\Facades\Http;

class FCMService
{
    protected static function getAccessToken()
    {
        $client = new GoogleClient();
        $client->setAuthConfig(config('services.fcm.credentials'));
        $client->addScope('https://www.googleapis.com/auth/firebase.messaging');

        $token = $client->fetchAccessTokenWithAssertion();

        return $token['access_token'];
    }

    public static function send(
        string $token,
        string $title,
        string $body,
        array $data = []
    ) {
        $accessToken = self::getAccessToken();

        $projectId = config('services.fcm.project_id');

        return Http::withToken($accessToken)
            ->post("https://fcm.googleapis.com/v1/projects/{$projectId}/messages:send", [
                'message' => [
                    'token' => $token,
                    'notification' => [
                        'title' => $title,
                        'body'  => $body,
                    ],
                    'data' => $data,
                ]
            ]);
    }
}
