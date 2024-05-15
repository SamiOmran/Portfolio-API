<?php

namespace App\Http\Requests;

use App\DTOs\PaginationDTO;
use Illuminate\Foundation\Http\FormRequest;

class PaginationIndexRequest extends FormRequest
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
            'pageSize' => ['nullable', 'integer', 'min:0'],
            'page' => ['nullable', 'integer', 'min:0'],
            'keyword' => ['nullable', 'string'],
        ];
    }

    public function toDTO(): PaginationDTO
    {
        $data = $this->validated();

        return PaginationDTO::from($data);
    }
}
