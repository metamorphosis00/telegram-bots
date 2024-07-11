<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use DefStudio\Telegraph\Models\TelegraphChat as BaseModel;

class Chat extends BaseModel
{
    protected $fillable = [
        'is_active'
    ];
}
