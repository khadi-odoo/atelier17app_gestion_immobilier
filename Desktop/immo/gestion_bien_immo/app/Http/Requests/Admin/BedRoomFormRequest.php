<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BedRoomFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mined>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'min:4'],
            'description' => ['required', 'min:8'],
            'surface' => ['required', 'float', 'min:10'],
            'toilet' => ['required', 'string'],
            'image' => ['max:2000'],
            'balcony' => ['required', 'integer'],
        ];
    }
}
