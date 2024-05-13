<?php

declare(strict_types=1);

namespace App\DTOs;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UserDTO extends Data
{
    public function __construct(
        public readonly string|Optional $name,
        public readonly string|Optional $email,
        public readonly string|Optional $password,
        public readonly string|Optional $country,
        public readonly int|Optional $articlesCount,
    ) {
        //
    }
}
