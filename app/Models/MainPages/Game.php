<?php

namespace App\Models\MainPages;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Game extends Model
{
    use HasFactory;

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function scopeScore(Builder $query, float $min, float $max)
    {
        return $query->where('score', '>', $min)->where('score', '<', $max);
    }
}
