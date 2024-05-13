<?php

use App\Http\Controllers\{
    ProjectController,
    UserController,
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['prefix' => 'v1/'], function () {
    Route::apiResources([
        'users' => UserController::class, 
        'projects' => ProjectController::class
    ]);
});
