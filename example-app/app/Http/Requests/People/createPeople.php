<?php

namespace App\Http\Requests\People;

use Illuminate\Foundation\Http\FormRequest;

class createPeople extends FormRequest
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
            'name' => 'required|string|min:5|max:255',
            'age' => 'required|integer|min:1|max:255',
            'number' => 'required|integer|min:1|max:255'
        ];
    }
}
