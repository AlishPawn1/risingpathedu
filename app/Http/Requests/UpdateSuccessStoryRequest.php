<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSuccessStoryRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array {
        return [
            'student_name' => 'required|string|max:255',
            'country_id'   => 'required|exists:countries,id',
            'service_id'   => 'nullable|exists:services,id',
            'title'        => 'required|string|max:255',
            'university'   => 'nullable|string|max:255',
            'intake'       => 'nullable|string|max:50',
            'visa_approved'=> 'boolean',
            'image'        => 'nullable|image|max:2048',
            'summary'      => 'nullable|string',
            'testimonial'  => 'nullable|string',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date',
        ];
    }
}
