<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    
    protected $fillable = [
    'name',
    'slug',
    'parent_id'
];

    public function posts(): hasMany
    {
        return $this->hasMany(Post::class);
    }
    
    public function subCategory(): hasMany
    {
        return $this->hasMany(Category::class, 'parent_id')->with('categories');
    }


}
