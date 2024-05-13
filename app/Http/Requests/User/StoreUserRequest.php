<?php

namespace App\Http\Requests\User;

use App\DTOs\UserDTO;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rules\File;

class StoreUserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', Rules\Password::defaults()],
            'title' => ['required', 'string', 'title', 'max:255'],
            'about_me' => ['required', 'string', 'max:255'],
            'resume' => ['required', 'file', File::extensions(['pdf'])],
        ];
    }

    public function toDTO(): UserDTO
    {
        $data = $this->validated();

        return UserDTO::from($data);
    }
}
