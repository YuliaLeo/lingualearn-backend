<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UsersWord extends Model
{
    use HasFactory;

    protected $fillable = [
        'word',
        'translation',
        'next_show_at',
        'folder_id'
    ];

    public function folder(): BelongsTo {
        return $this->belongsTo(Folder::class);
    }
}
