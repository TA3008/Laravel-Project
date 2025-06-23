<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Support\Str;
use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     protected $fillable = ['name', 'slug', 'status'];
     
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    protected static function boot()
    {
        parent::boot();
        // Gen Slug từ Name
        static::saving(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }

            if (empty($category->status)) {
                $category->status = StatusEnum::INACTIVE;
            }
        });
    }
}
