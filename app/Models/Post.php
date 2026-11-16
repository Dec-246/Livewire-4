<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'status', 'views'];

    protected $casts = [
        'status' => StatusEnum::class,
    ];

    protected function pageViewsCount(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->views,
        );
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
