<?php

namespace App\Observers;

use App\Models\Bot;

class BotObserver
{
    /**
     * Handle the Bot "created" event.
     */
    public function created(Bot $bot): void
    {
        $bot->registerWebhook()->send();
    }

    /**
     * Handle the Bot "updated" event.
     */
    public function updated(Bot $bot): void
    {
        if ($bot->wasChanged('is_active')) {
            if ($bot->is_active) {
                $bot->registerWebhook()->send();
            } else {
                $bot->unregisterWebhook()->send();
            }
        }
    }

    /**
     * Handle the Bot "deleted" event.
     */
    public function deleted(Bot $bot): void
    {
        $bot->unregisterWebhook()->send();
    }

    /**
     * Handle the Bot "restored" event.
     */
    public function restored(Bot $bot): void
    {
        //
    }

    /**
     * Handle the Bot "force deleted" event.
     */
    public function forceDeleted(Bot $bot): void
    {
        //
    }
}
