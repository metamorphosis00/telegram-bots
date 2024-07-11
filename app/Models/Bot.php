<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use DefStudio\Telegraph\Models\TelegraphBot as BaseModel;

class Bot extends BaseModel
{
    protected $fillable = [
        'token',
        'is_active'
    ];
}
