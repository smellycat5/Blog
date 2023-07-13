<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class BlogUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title'=> ['required','max: 20'],
            'content'=>['required']
        ];
    }

      /**
     * Change the title into Title case
     *
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'title' => Str::title($this->title)
        ]);
    }
}
