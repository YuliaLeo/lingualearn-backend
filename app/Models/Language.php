<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Language extends Model
{
    use HasFactory;

    public function folders(): HasMany {
        return $this->hasMany(Folder::class);
    }

    public function themes(): HasMany {
        return $this->hasMany(Theme::class);
    }

    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class, 'user_language_level', 'language_id', 'user_id');
    }
}
