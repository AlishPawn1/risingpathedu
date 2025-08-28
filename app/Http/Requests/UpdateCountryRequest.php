<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCountryRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array {
        $id = $this->route('country')->id ?? null;

        return [
            'name' => ['required','string','max:255', Rule::unique('countries','name')->ignore($id)],
            'slug' => ['nullable','string', Rule::unique('countries','slug')->ignore($id)],
            'code' => 'nullable|string|size:2',
            'flag' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
            'is_active' => 'boolean'
        ];
    }
}
