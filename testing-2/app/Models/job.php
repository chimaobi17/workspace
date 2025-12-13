<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'salary', /* etc */];

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'job_tag'); // ← important: specify the table
    }
}