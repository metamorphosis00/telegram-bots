<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Bot extends Model
{
    use HasFactory;

    protected $fillable = [
        'token',
        'is_active'
    ];

    public function chats(): BelongsToMany
    {
        return $this->belongsToMany(Chat::class);
    }
}
