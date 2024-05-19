<?php

declare(strict_types=1);

namespace App\DTOs;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UserDTO extends Data
{
    public function __construct(
        public readonly string|Optional $first_name,
        public readonly string|Optional $last_name,
        public readonly string|Optional $email,
        public readonly string|Optional $title,
        public readonly string|Optional $about_me,
        public readonly string|Optional $resume,
    ) {
        //
    }
}
