<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faq extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'faq_category_id',
        'title',
        'description',
        'meta_title',
        'meta_description',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function category()
    {
        return $this->belongsTo(FaqCategory::class, 'faq_category_id');
    }
}