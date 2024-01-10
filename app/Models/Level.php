<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Level extends Model
{
    use HasFactory;

    public function themes(): HasMany {
        return $this->hasMany(Theme::class);
    }

    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class, 'user_language_level', 'level_id', 'user_id');
    }
}
