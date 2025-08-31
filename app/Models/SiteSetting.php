<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $table = 'site_settings';

    protected $fillable = [
        // Branding
        'site_name',
        'site_logo',
        'footer_logo',
        'favicon',

        // Contact info
        'email',
        'secondary_email',
        'contact_number',
        'secondary_contact_number',
        'location',
        'map_embed',

        // SEO / Meta
        'meta_title',
        'meta_description',
        'meta_keywords',

        // Social links
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
        'youtube',

        // Extra content
        'footer_text',
        'business_hours',
    ];
}
