# laravel-ai-smart-reply

Laravel package scaffold by Amr Lotfy — generates AI smart replies for CRM/ERP systems.
Supports OpenAI and OpenRouter providers. Designed to be installed inside any Laravel app.

## Features
- Provider-based architecture (OpenAI, OpenRouter)
- Configurable templates and language support (en/ar/both)
- Simple service: `AiReply::generate(message, context, lang)`

## Quick usage
1. Require package via composer (local path for now) or place inside `packages/amrlotfy/ai-smart-reply`.
2. Add service provider in `config/app.php` providers array (or use package discovery):
```php
AmrLotfy\AiSmartReply\AiSmartReplyServiceProvider::class,
```

3. Publish config:
```bash
php artisan vendor:publish --tag=config
```

4. Set env keys in `.env`:
```
AI_SMART_REPLY_PROVIDER=openai
OPENAI_API_KEY=sk-...
OPENAI_MODEL=gpt-4o-mini
AI_SMART_REPLY_LANG=both
```

5. Use in code:
```php
use AmrLotfy\AiSmartReply\Services\AiReply;

$reply = AiReply::generate('Customer: I did not receive my order', 'Order #1234', 'en');
```

## Notes
- This is a scaffold/starting point. You should add error handling, rate limit handling, retries, and tests before publishing.
- Providers use Laravel HTTP client (Http::) for requests.
