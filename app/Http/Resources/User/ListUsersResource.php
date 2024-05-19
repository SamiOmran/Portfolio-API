<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ListUsersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /**
         * @var  \App\Models\User
         */
        $user = $this;

        return [
            'id' => $user->id,
            'first_name' => $user->first_name,
            'title' => $user->title,
        ];
    }
}
