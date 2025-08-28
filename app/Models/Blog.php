<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'author',
        'description',
        'image',
        'status',
    ];

    // RELATIONSHIPS
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'blog_category', 'blog_id', 'category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'blog_tag', 'blog_id', 'tag_id');
    }

}
