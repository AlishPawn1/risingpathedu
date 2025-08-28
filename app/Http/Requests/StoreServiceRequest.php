<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array {
        return [
            'title' => 'required|string|max:255',
            'slug'  => 'nullable|string|unique:services,slug',
            'short_description' => 'nullable|string|max:300',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
            'is_active' => 'boolean',
            'display_order' => 'integer|min:0',
            'meta_title' => 'nullable|string|max:70',
            'meta_description' => 'nullable|string|max:160',
        ];
    }
}
