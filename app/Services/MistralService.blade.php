<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class MistralService
{
    protected $apiKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->apiKey = config('services.mistral.api_key');
        $this->baseUrl = config('services.mistral.base_url');
    }

    public function generateResponse(string $prompt, string $model = 'mistral-small')
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
            'Content-Type' => 'application/json',
        ])->post($this->baseUrl, [
            'model' => $model,
            'messages' => [
                ['role' => 'user', 'content' => $prompt]
            ],
            'temperature' => 0.7
        ]);

        if ($response->failed()) {
            throw new \Exception('Erreur Mistral API : ' . $response->body());
        }

        return $response->json('choices')[0]['message']['content'] ?? '';
    }
}
