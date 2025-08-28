<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCountryRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array {
        return [
            'name' => 'required|string|max:255|unique:countries,name',
            'slug' => 'nullable|string|unique:countries,slug',
            'code' => 'nullable|string|size:2',
            'flag' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
            'is_active' => 'boolean'
        ];
    }
}
