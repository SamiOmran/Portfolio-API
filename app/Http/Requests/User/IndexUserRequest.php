<?php

namespace App\Http\Requests\User;

use App\Http\Requests\PaginationIndexRequest;

class IndexUserRequest extends PaginationIndexRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
