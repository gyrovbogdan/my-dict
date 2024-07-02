<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ArticleDictionary extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $fillable = ['word', 'translation'];

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }
}
