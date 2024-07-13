<?php

namespace App\Http\Webhooks;

use Illuminate\Support\Stringable;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;
use App\DTO\MessageDTO;
use App\Jobs\ProcessTelegramMessage;

class TelegramWebhookHandler extends \DefStudio\Telegraph\Handlers\WebhookHandler
{
    protected function handleChatMessage(Stringable $text): void
    {
        Log::notice('Message received: '.$text->toString());

        $user = $this->message->from();
        $data = [
            'chat_id' => $this->chat->chat_id,
            'user_id' => $user->id(),
            'is_bot' =>  $user->isBot(),
            'text' => $text->toString(),
            'message_id' => $this->messageId
        ];

        Log::notice(print_r($data, true));

        $message = MessageDTO::fromArray($data);
        ProcessTelegramMessage::dispatch($message);
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
