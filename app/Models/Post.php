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

    protected static function boot()
    {
        parent::boot();
        // Gen Slug từ Title
        static::creating(function ($post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }

            // Nếu không có status thì set mặc định là draft
            if (empty($post->status)) {
                $post->status = PostENum::DRAFT;
            }
        });
    }

    public function scopePublished($query)
    {
        return $query->where('status', PostEnum::PUBLISHED);
    }
}
