<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePageRequest extends FormRequest
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

        foreach ($this->input('pages', []) as $id => $page) {
            $rules["pages.$id.title"] = [
                'required',
                'string',
                'max:255',
                Rule::unique('pages', 'title')->ignore($id),
            ];
            $rules["pages.$id.order"] = ['required', 'integer'];
            $rules["pages.$id.is_active"] = ['boolean'];
        }

        return $rules;
    }

    public function attributes(): array
    {
        return [
            'pages.*.title'     => 'title',
            'pages.*.order'     => 'order',
            'pages.*.is_active' => 'is active',
        ];
    }
}
