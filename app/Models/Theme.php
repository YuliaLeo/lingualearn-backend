<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Theme extends Model
{
    use HasFactory;

    public function words(): BelongsToMany {
        return $this->belongsToMany(UsersWord::class);
    }

    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class);
    }

    public function level(): BelongsTo {
        return $this->belongsTo(Level::class);
    }

    public function language(): BelongsTo {
        return $this->belongsTo(Language::class);
    }
}
