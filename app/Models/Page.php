<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Page extends Model
{
    public function attachments(): MorphMany
    {
        return $this->morphMany(Attachment::class, 'attachable');
    }

    public function reactions(): MorphMany
    {
        return $this->morphMany(Reaction::class, 'reactable');
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function followers(): MorphMany
    {
        return $this->morphMany(Follow::class, 'followable');
    }

    public function admins(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'page_admin');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'page_category');
    }

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'page_post');
    }
}
