<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuccessStory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'student_name',
        'country',
        'service',
        'university',
        'intake',
        'visa_approved',
        'image',
        'summary',
        'testimonial',
        'is_published'
    ];

    protected $casts = [
        'visa_approved' => 'boolean',
        'is_published' => 'boolean',
    ];
}
