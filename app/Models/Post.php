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

    
    protected $fillable = [
        'cover_image', 
        'title',
        'body',
        'meta_description',
        'published_at',
        'featured',
        'author_id',
        'category_id'
    ];

    public function id(): int
    {
        return $this->id;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id')->withDefault('Cyprian Wetende');
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
