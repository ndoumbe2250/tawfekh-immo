<?php

namespace App\Http\Controllers;

use App\Services\MistralService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatController extends Controller
{
   public function chat(Request $request)
    {
        $request->validate(['message' => 'required|string']);

        $apiKey = "WJ4hnGUrHJBDfBpkwKMxohngVoEoPYE4";
        $baseUrl = 'https://api.mistral.ai/v1/chat/completions';
        $model = 'mistral-small';
        $prompt = $request->input('message');

        // 1. Prompt système (règles de l'assistant immobilier)
            $systemPrompt = <<<PROMPT
            Tu es un assistant virtuel expert en immobilier nommé "ImmoHelper". Tu réponds de manière concise et professionnelle aux questions sur :
            - La recherche de biens (prix, quartiers, tendances).
            - Le financement (prêts, taux, capacité d'emprunt).
            - Les démarches administratives (notaire, diagnostics).
            Ne donne pas de conseils juridiques. Pour les calculs précis, propose un simulateur ou un expert.
            PROMPT;
            // 2. Question de l'utilisateur (récupérée via un formulaire par exemple)
            
            

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
            'Content-Type' => 'application/json',
        ])->post($baseUrl, [
            'model' => $model,
            'messages' => [
                ['role' => 'system', 'content' => $systemPrompt],
                ['role' => 'assistant', 'content' => 'Bonjour !je suis ImmoHelper, un assistant virtuel expert en immobilier. Comment puis-je aider ?'],
                ['role' => 'user', 'content' => $prompt]
            ],
            'temperature' => 0.7
        ]);

        if ($response->failed()) {
            return response()->json([
                'reply' => 'Erreur Mistral API : ' . $response->body()
            ], 500);
        }

        return response()->json([
            'reply' => $response->json('choices')[0]['message']['content'] ?? "Réponse vide."
        ]);
    }

      
    // return $response->json('choices.0.message.content');

}


