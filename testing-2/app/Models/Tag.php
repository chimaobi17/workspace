<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory;

    public function posts(): BelongsToMany
{
    return $this->belongsToMany(Posts::class, 'post_tag', 'tag_id', 'post_id');
}

public function jobs(): BelongsToMany
{
    return $this->belongsToMany(Job::class, 'job_tag', 'job_id', 'tag_id');
}
}




