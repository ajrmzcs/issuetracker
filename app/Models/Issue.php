<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Issue extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'status_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public static function search($value): Builder
    {
        return empty($value) ? static::query()
            : static::where(function ($query) use ($value) {
                $query->where('issues.title', 'like', '%'.$value.'%')
                    ->orWhere('issues.description', 'like', '%'.$value.'%')
                    ->orWhere('users.name', 'like', '%'.$value.'%')
                    ->orWhere('statuses.name', 'like', '%'.$value.'%');
            });
    }
}
