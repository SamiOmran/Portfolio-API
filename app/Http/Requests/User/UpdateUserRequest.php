<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'first_name' => ['required', 'sometimes', 'string', 'max:255'],
            'last_name' => ['required', 'sometimes', 'string', 'max:255'],
            'email' => ['required', 'sometimes', 'string', 'email', 'max:255', 'unique:' . User::class],
            'title' => ['required', 'sometimes', 'string', 'max:255'],
            'about_me' => ['required', 'sometimes', 'string', 'max:255'],
        ];
    }
}
