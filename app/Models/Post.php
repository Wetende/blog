<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany as RelationsBelongsToMany;

class Post extends Model
{
    use HasFactory;

    protected $table = 'post';

    
    protected $fillable = ['title','id', 'body'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault('Admin User');
    }

    public function tags(): RelationsBelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'post_tag');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
