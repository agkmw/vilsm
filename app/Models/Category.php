<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    public function pages(): BelongsToMany
    {
        return $this->belongsToMany(Page::class, 'page_category');
    }
}
