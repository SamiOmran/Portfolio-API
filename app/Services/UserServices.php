<?php

declare(strict_types=1);

namespace App\Services;

use App\DTOs\PaginationDTO;
use App\DTOs\UserDTO;
use App\Models\Article;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

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

    public function getArticlesCount(User $user): int
    {
        // $count = Article::where('author', $user->id)->count();
        $count = $user->articles_count;

        return $count;
    }
}
