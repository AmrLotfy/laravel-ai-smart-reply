<?php
namespace AmrLotfy\AiSmartReply\Services;

use AmrLotfy\AiSmartReply\Providers\OpenAiProvider;
use AmrLotfy\AiSmartReply\Providers\OpenRouterProvider;

class AiReply
{
    protected static function getProviderInstance(): mixed
    {
        $driver = config('ai-smart-reply.default', 'openai');

        return match($driver) {
            'openrouter' => new OpenRouterProvider(),
            default => new OpenAiProvider(),
        };
    }

    public static function generate(string $message, ?string $context = null, string $lang = 'en'): string
    {
        // allow 'both' configuration: choose language based on parameter
        if(config('ai-smart-reply.language') === 'both') {
            $lang = in_array($lang, ['ar','en']) ? $lang : 'en';
        } else {
            $lang = config('ai-smart-reply.language', 'en');
        }

        $provider = static::getProviderInstance();
        return $provider->generateReply($message, $context, $lang);
    }
}
