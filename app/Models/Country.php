<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'flag',
        'image',
        'short_text',
        'is_active',
        'description',
        'institutes',
        'media_type',
        'media_url',
        'meta_title',
        'meta_description',
    ];

    public function successStories()
    {
        return $this->hasMany(SuccessStory::class);
    }
}
