<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Advertisement extends Model
{
    use HasFactory;

    public function keywords(): BelongsToMany
    {
        return $this->belongsToMany(Keyword::class);
    }


    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    public function scopeSearchInTitle(Builder $query, ?string $term): Builder
    {
        if (!isset($term)) {
            return $query;
        }
        return $query->where(
            'title',
            'ilike',
            "%{$term}%"
        );
    }

    public function scopeSearchInDescription(Builder $query, ?string $term): Builder
    {
        if (!isset($term)) {
            return $query;
        }
        return $query->orWhere(
            'description',
            'ilike',
            "%{$term}%"
        );
    }

    public function scopeSearchWithKeywordName(Builder $query, array $keywords): Builder
    {
        collect($keywords)->each(
            function ($keyword) use (&$query) {
                return $query->whereHas(
                    'keywords',
                    function ($query) use ($keyword) {
                        $query->where('name', 'ilike', $keyword);
                    }
                );
            }
        );
        return $query;
    }
}
