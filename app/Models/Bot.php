<?php

namespace App\Models;

use App\Observers\BotObserver;
use DefStudio\Telegraph\Models\TelegraphBot as BaseModel;

class Bot extends BaseModel
{
    protected $fillable = [
        'token',
        'is_active'
    ];

    public static function booted()
    {
        parent::booted();
        Bot::observe(BotObserver::class);
    }
}
