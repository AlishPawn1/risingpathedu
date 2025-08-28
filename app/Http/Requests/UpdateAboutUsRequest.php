<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAboutUsRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array {
        return [
            'heading' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'mission' => 'nullable|string',
            'vision'  => 'nullable|string',
            'image'   => 'nullable|image|max:2048',
            'email'   => 'nullable|email',
            'phone'   => 'nullable|string|max:50',
            'address' => 'nullable|string|max:255',
            'facebook_url' => 'nullable|url',
            'instagram_url'=> 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'youtube_url'  => 'nullable|url',
            'meta_title'       => 'nullable|string|max:70',
            'meta_description' => 'nullable|string|max:160',
        ];
    }
}
