# 🧠 Laravel AI Smart Reply  
**by [Amr Lotfy](https://www.linkedin.com/in/amr-lotfy-saleh-09438b113/)**  
> Smart, multilingual AI-powered reply generator for any CRM / ERP / Support system built with Laravel.  
> Supports **OpenAI** and **OpenRouter**, with Arabic and English responses.

---

## ⚙️ Features
- 🧩 **Provider-based architecture** (OpenAI, OpenRouter)
- 🌍 **Language support:** Arabic / English / Both
- 💬 **Customizable AI prompt templates**
- ⚡ **Plug & play:** Works with any CRM, ERP, or Ticket System
- 🪶 **Lightweight & extendable** — easy to add new providers

---

## 📦 Installation

You can install the package via Composer:

```bash
composer require amrlotfy/laravel-ai-smart-reply
```

If Laravel does not auto-discover the provider, you can manually register it in  
`config/app.php`:

```php
'providers' => [
    AmrLotfy\AiSmartReply\AiSmartReplyServiceProvider::class,
],
```

Then publish the configuration file:
```bash
php artisan vendor:publish --provider="AmrLotfy\AiSmartReply\AiSmartReplyServiceProvider" --tag=config
```

---

## ⚙️ Configuration

Set your environment variables in `.env`:

```
AI_SMART_REPLY_PROVIDER=openai
OPENAI_API_KEY=sk-...
OPENAI_MODEL=gpt-4o-mini
OPENROUTER_API_KEY=sk-...
OPENROUTER_MODEL=gpt-4-turbo
AI_SMART_REPLY_LANG=both
```

---

## 🧠 Usage Example

```php
use AmrLotfy\AiSmartReply\Services\AiReply;

// English
$reply = AiReply::generate(
    message: 'Customer: My payment failed',
    context: 'CRM Ticket #552',
    lang: 'en'
);

echo $reply;

// Arabic
$reply = AiReply::generate(
    message: 'العميل قال إن الدفع فشل',
    context: 'تذكرة رقم 552',
    lang: 'ar'
);

echo $reply;
```

---

## 🧩 Configuration File Overview
`config/ai-smart-reply.php`:
```php
return [
    'default' => 'openai', // or openrouter
    'language' => 'both',  // en | ar | both

    'providers' => [
        'openai' => [...],
        'openrouter' => [...],
    ],

    'templates' => [
        'default' => [
            'en' => "You are a helpful support assistant. Context: {context}. Message: {message}",
            'ar' => "أنت مساعد دعم فني. السياق: {context}. الرسالة: {message}",
        ],
    ],
];
```

---

## 🧱 Extend It
To add another provider, just create a class implementing:
```php
AmrLotfy\AiSmartReply\Providers\AiProviderInterface
```
and register it in `config/ai-smart-reply.php`.

---

## 🧪 Coming Soon (v1.1)
- 🧠 Reply caching
- 🔁 Retry & Rate Limit handling
- 💬 Streaming responses
- 🧪 Unit Tests
- ⚙️ Queue support

---

## 🧑‍💻 Author
**Amr Lotfy**  
- 💼 [LinkedIn](https://www.linkedin.com/in/amr-lotfy-saleh-09438b113/)  
- 📧 [amrlotfy07@gmail.com](mailto:amrlotfy07@gmail.com)  
- 🧰 Laravel Developer | AI Automation Expert | Instructor

---

## 📄 License
MIT License © 2025 Amr Lotfy
