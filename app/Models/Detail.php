<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Detail extends Model
{
    use HasFactory;

    public function keyword(): BelongsTo
    {
        return $this->belongsTo(Keyword::class);
    }

    public function keywordName(): string
    {
        return $this->keyword()->first()->name;
    }

    public function keywordType(): string
    {
        return $this->keyword()->first()->type;
    }
}
