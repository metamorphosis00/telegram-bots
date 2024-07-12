<?php

namespace App\Http\Webhooks;

use Illuminate\Support\Stringable;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class TelegramWebhookHandler extends \DefStudio\Telegraph\Handlers\WebhookHandler
{
    protected function handleChatMessage(Stringable $text): void
    {
        Log::notice('Message received');
    }

    protected function onFailure(Throwable $throwable): void
    {
        if ($throwable instanceof NotFoundHttpException) {
            throw $throwable;
        }

        report($throwable);

        $this->reply('sorry man, I failed');
    }
}
