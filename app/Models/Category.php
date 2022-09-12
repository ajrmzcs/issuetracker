<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function issues(): BelongsToMany
    {
        return $this->belongsToMany(Issue::class);
    }

    public static function search($value): Builder
    {
        return empty($value) ? static::query()
            : static::where(function ($query) use ($value) {
                $query->where('name', 'like', '%'.$value.'%')
                    ->orWhere('created_at', 'like', '%'.$value.'%');
            });
    }
}
