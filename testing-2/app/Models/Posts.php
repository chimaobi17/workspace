<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Posts extends Model
{
    use HasFactory;

    // Remove this line completely — Laravel already knows the table is "posts"
    // protected $table = 'Posts';

    protected $fillable = ['name', 'salary', 'employer_id'];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    // THIS IS THE CORRECT METHOD NAME
    public function tags(): BelongsToMany
{
    return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
}
}