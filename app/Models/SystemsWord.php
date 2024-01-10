<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class SystemsWord extends Model
{
    use HasFactory;

    public function themes(): BelongsToMany {
        return $this->belongsToMany(Theme::class);
    }
}
