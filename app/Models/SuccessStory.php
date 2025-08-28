<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuccessStory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'student_name','country_id','service_id','title','university','intake',
        'visa_approved','image','summary','testimonial','is_published','published_at'
    ];

    protected $casts = [
        'visa_approved' => 'boolean',
        'is_published'  => 'boolean',
        'published_at'  => 'datetime',
    ];

    public function country() { return $this->belongsTo(Country::class); }
    public function service() { return $this->belongsTo(Service::class); }
}
