<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AboutUs extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'about_us';

    protected $fillable = [
        'heading','content','mission','vision','image',
        'email','phone','address',
        'facebook_url','instagram_url','linkedin_url','youtube_url',
        'meta_title','meta_description'
    ];
}
