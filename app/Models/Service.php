<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'image',
        'is_active',
    ];

    public function faqs()
    {
        return $this->hasMany(Faq::class);
    }

    public function successStories()
    {
        return $this->hasMany(SuccessStory::class);
    }
}
