<?php
namespace AmrLotfy\AiSmartReply;

use Illuminate\Support\ServiceProvider;

class AiSmartReplyServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/ai-smart-reply.php', 'ai-smart-reply');
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/ai-smart-reply.php' => config_path('ai-smart-reply.php'),
        ], 'config');
    }
}
