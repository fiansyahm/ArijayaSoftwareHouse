<?php

namespace App\Http\Controllers;
use App\Models\Holiday;
use App\Models\Wedding;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;

class GeminiController extends Controller
{
    public function getGeminiReplay($message){
        $apiKey = 'AIzaSyCfQvu0vb5BC1Y3A0Yxd8Pd1qwtKsvY8JE';
        $geminiApiUrl = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key={$apiKey}";

        $requestBody = [
            "contents" => [
                [
                    "parts" => [
                        [
                            "text" => $message,
                            // "text" => $columnholiday."\n\n".'Kolom mana yang gak boleh dikosongi saat insert',
                        ]
                    ]
                ]
            ]
        ];

        // Kirim permintaan ke Gemini API
        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->post($geminiApiUrl, [
                'headers' => ['Content-Type' => 'application/json'],
                'json' => $requestBody,
            ]);

            $responseData = json_decode($response->getBody()->getContents(), true);
            $generatedContent = $responseData['candidates'][0]['content']['parts'][0]['text'];
            return $generatedContent;
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

}