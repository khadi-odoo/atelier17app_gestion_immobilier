<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyContactRequest extends FormRequest
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
        return [
            'fristname' => ['required', 'string', 'min:2'],
            'lastname' => ['required', 'string', 'min:2'],
            'phone' => ['required', 'integer', 'min:9'],
            'email' => ['required', 'string', 'email:rfc'],
            'message' => ['required', 'string', 'min:2'],

        ];
    }
}
