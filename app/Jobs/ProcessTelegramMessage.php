<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\DTO\MessageDTO;
use App\Models\Message;
use Illuminate\Support\Facades\Log;

class ProcessTelegramMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private MessageDTO $message;
    /**
     * Create a new job instance.
     */
    public function __construct(MessageDTO $message)
    {
        $this->message = $message;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $data = $this->message->toArray();
        Log::info('Message is creating with data:');
        Log::info(print_r($data, true));

        Message::create($data);
    }
}
