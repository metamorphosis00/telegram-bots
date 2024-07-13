<?php

namespace App\DTO;

use App\Models\Message;
use Illuminate\Contracts\Support\Arrayable;
class MessageDTO implements Arrayable
{
    private $chat_id;

    private $user_id;

    private $text;
    private $is_bot;

    private $message_id;

    public static function fromArray(array $data): MessageDTO
    {
        $message = new self();

        if (isset($data['chat_id'])) {
            $message->chat_id = $data['chat_id'];
        }

        if (isset($data['user_id'])) {
            $message->user_id = $data['user_id'];
        }

        if (isset($data['message_id'])) {
            $message->message_id = $data['message_id'];
        }

        if (isset($data['text'])) {
            $message->text = $data['text'];
        }

        if (isset($data['is_bot'])) {
            $message->is_bot = $data['is_bot'];
        }

        return  $message;
    }

    public function chat_id()
    {
        return $this->chat_id;
    }

    public function text()
    {
        return $this->text;
    }

    public function is_bot()
    {
        return $this->is_bot;
    }

    public function user_id()
    {
        return $this->user_id;
    }

    public function message_id()
    {
        return $this->message_id;
    }
    public function toArray()
    {
        return [
            'chat_id' => $this->chat_id,
            'user_id' => $this->user_id,
            'message_id' => $this->message_id,
            'text' => $this->text,
            'is_bot' => $this->is_bot
        ];
    }
}
