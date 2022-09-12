<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Status extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function issues(): HasMany
    {
        return $this->hasMany(Issue::class);
    }

    public static function search($value): Builder
    {
        return empty($value) ? static::query()
            : static::where(function ($query) use ($value) {
                $query->where('name', 'like', '%'.$value.'%');
            });
    }
}
