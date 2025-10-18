<?php
namespace AmrLotfy\AiSmartReply\Providers;

interface AiProviderInterface
{
    public function generateReply(string $message, ?string $context = null, string $lang = 'en'): string;
}
