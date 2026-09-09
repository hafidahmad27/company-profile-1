<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSectionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [];

        foreach ($this->input('sections', []) as $id => $section) {
            $rules["sections.$id.title"] = [
                'nullable',
                'string',
                'max:255',
                // Rule::unique('sections', 'title')->ignore($id),
            ];
            $rules["sections.$id.subtitle"] = ['nullable', 'string', 'max:255'];
            $rules["sections.$id.content"]     = ['nullable', 'string'];
            $rules["sections.$id.image"]       = ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'];
            $rules["sections.$id.button_text"] = ['nullable', 'string', 'max:255'];
            $rules["sections.$id.button_link"] = ['nullable', 'string', 'max:255'];
            $rules["sections.$id.order"]    = ['nullable', 'integer'];
            $rules["sections.$id.is_active"] = ['boolean'];
        }

        return $rules;
    }

    public function attributes(): array
    {
        return [
            'sections.*.title'       => 'title',
            'sections.*.subtitle'    => 'subtitle',
            'sections.*.content'     => 'content',
            'sections.*.image'       => 'image',
            'sections.*.button_text' => 'button text',
            'sections.*.button_link' => 'button link',
            'sections.*.order'       => 'order',
            'sections.*.is_active'   => 'is active',
        ];
    }
}
