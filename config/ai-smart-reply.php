<?php
return [
    'default' => env('AI_SMART_REPLY_PROVIDER', 'openai'),

    'providers' => [
        'openai' => [
            'driver' => 'openai',
            'api_key' => env('OPENAI_API_KEY'),
            'model' => env('OPENAI_MODEL', 'gpt-4o-mini'),
            'base_url' => env('OPENAI_BASE_URL', 'https://api.openai.com/v1'),
        ],
        'openrouter' => [
            'driver' => 'openrouter',
            'api_key' => env('OPENROUTER_API_KEY'),
            'model' => env('OPENROUTER_MODEL', 'gpt-4o-mini'),
            'base_url' => env('OPENROUTER_BASE_URL', 'https://openrouter.ai/api/v1'),
        ],
    ],

    'language' => env('AI_SMART_REPLY_LANG', 'both'), // 'en' | 'ar' | 'both'

    // Prompt templates per language and tone
    'templates' => [
        'default' => [
            'en' => "You are a helpful customer support assistant. Reply concisely and professionally.\nContext: {context}\nMessage: {message}",
            'ar' => "أنت مساعد دعم فني. أجب بشكل احترافي وموجز.\nالسياق: {context}\nالرسالة: {message}",
        ],
    ],
];
