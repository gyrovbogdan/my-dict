<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserDictionary extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $fillable = ['word', 'translation'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
