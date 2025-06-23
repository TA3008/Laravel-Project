<?php

namespace App\Models;

use App\Enums\PostEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'status',
        'user_id',
        'image',
    ];

    protected $casts = [
        'status' => PostEnum::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    protected static function boot()
    {
        parent::boot();
        // Gen Slug từ Title
        static::saving(function ($post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }

            if (empty($post->status)) {
                $post->status = PostEnum::DRAFT;
            }
        });
    }

    public function scopePublished($query)
    {
        return $query->where('status', PostEnum::PUBLISHED);
    }
}
