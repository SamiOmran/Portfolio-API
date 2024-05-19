<?php

declare(strict_types=1);

namespace App\Services;

use App\DTOs\PaginationDTO;
use App\DTOs\UserDTO;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;

class UserServices
{
    public function getUsers(PaginationDTO $paginationDTO): LengthAwarePaginator
    {
        $page = $paginationDTO->page;
        $pageSize = $paginationDTO->pageSize;

        return User::query()->paginate($pageSize, page: $page);
    }

    public function storeUser(UserDTO $userDTO): User
    {
        return User::create($userDTO->toArray());
    }

    public function storeUserResume(User $user, Request $request): User
    {
        $path = config('app.resumes_dir.path');
        $resumeFile = $request->file('resume');
        $resumeName = $resumeFile->getClientOriginalName();

        $user->update(['resume' => storage_path($path) . '\\' . $resumeName]);
        $user->save();

        Storage::putFileAs(
            'public\resumes\\',
            $resumeFile,
            $resumeName,
        );

        return $user;
    }

    public function showUser(User $user): User
    {
        return $user;
    }

    public function updateUser(User $user, UserDTO $userDTO): bool
    {
        return $user->update($userDTO->toArray());
    }

    public function destroyUser(User $user): ?bool
    {
        return $user->delete();
    }
}
