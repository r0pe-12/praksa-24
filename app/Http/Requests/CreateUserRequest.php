<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            //
            "fname" => ['required', 'string', 'max:255'],
            "lname" => ['required', 'string', 'max:255'],
            "role_id" => ['required', 'int', 'exists:roles,id'],
            "password" => ['required', 'confirmed'],
            "email" => ['required', 'email', 'max:255', 'unique:users']
        ];
    }
}
