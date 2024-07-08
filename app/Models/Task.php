<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    public function taskchanges(): HasMany
    {
        return $this->hasMany(TaskChange::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
