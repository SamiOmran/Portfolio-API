<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\{
    DestroyUserRequest,
    IndexUserRequest,
    ShowUserRequest,
    StoreUserRequest,
    UpdateUserRequest,
};
use App\Http\Resources\User\{
    ListUsersResource,
    ShowUserResource,
};
use App\Models\User;
use App\Services\{
    UserServices,
};
use Illuminate\Http\{
    JsonResponse,
    Request,
};

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexUserRequest $request, UserServices $service): JsonResponse
    {
        $data = $service->getUsers($request->toDTO());

        return $this->sendResponse('Success retrieving users', 200, ListUsersResource::collection($data)->response()->getData(true));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request, UserServices $service): JsonResponse
    {
        $user = $service->storeUser($request->toDTO());

        return $this->sendResponse('Success storing new user', 201, new ShowUserResource($user));
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowUserRequest $request, User $user, UserServices $service): JsonResponse
    {
        $user = $service->showUser($user);

        return $this->sendResponse('Success retrieving user', 200, new ShowUserResource($user));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user, UserServices $service): JsonResponse
    {
        $updated = $service->updateUser($user, $request->toDTO());

        if ($updated) {
            return $this->sendResponse('User updated successfully', 202, new ShowUserResource($user));
        }

        return $this->sendFailure('Error occuered while updating user', 500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DestroyUserRequest $request, User $user, UserServices $service): JsonResponse
    {
        $destroyed = $service->destroyUser($user);

        if ($destroyed) {
            return $this->sendResponse('User deleted successfully', 200);
        }

        return $this->sendFailure('Error occuered while deleting user', 500);
    }
}
