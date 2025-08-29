<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name','slug','short_text' ,'flag','description','is_active'
    ];

    public function successStories() {
        return $this->hasMany(SuccessStory::class);
    }
}
