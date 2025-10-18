<?php
namespace AmrLotfy\AiSmartReply\Providers;

use Illuminate\Support\Facades\Http;

class OpenRouterProvider implements AiProviderInterface
{
    public function generateReply(string $message, ?string $context = null, string $lang = 'en'): string
    {
        $prompt = str_replace(['{context}','{message}'], [$context, $message], config('ai-smart-reply.templates.default.' . ($lang === 'ar' ? 'ar' : 'en')));

        $response = Http::withHeaders([
                'Authorization' => 'Bearer '.config('ai-smart-reply.providers.openrouter.api_key'),
            ])->post(config('ai-smart-reply.providers.openrouter.base_url') . '/chat/completions', [
                'model' => config('ai-smart-reply.providers.openrouter.model'),
                'messages' => [['role' => 'user', 'content' => $prompt]],
            ]);

        return $response->json('choices.0.message.content') ?? '';
    }
}
