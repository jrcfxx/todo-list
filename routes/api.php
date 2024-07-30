<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskChangeController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/getuserinfo', [AuthController::class, 'getUserInfo']);

// Grouping routes protected with auth:sanctum middleware
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    // Users routes
    Route::group(['middleware' => ['permission:view-users']], function () {
        Route::get('/users', [UsersController::class, 'index']);
        Route::get('/users/{user}', [UsersController::class, 'show']);
    });
    Route::group(['middleware' => ['permission:create-users']], function () {
        Route::post('/users', [UsersController::class, 'store']);
    });
    Route::group(['middleware' => ['permission:edit-users']], function () {
        Route::put('/users/{user}', [UsersController::class, 'update']);
    });
    Route::group(['middleware' => ['permission:delete-users']], function () {
        Route::delete('/users/{user}', [UsersController::class, 'destroy']);
    });

    // Roles routes
    Route::group(['middleware' => ['permission:view-roles']], function () {
        Route::get('/role', [RoleController::class, 'index']);
        Route::get('/role/{role}', [RoleController::class, 'show']);
    });
    Route::group(['middleware' => ['permission:create-roles']], function () {
        Route::post('/role', [RoleController::class, 'store']);
    });
    Route::group(['middleware' => ['permission:edit-roles']], function () {
        Route::put('/role/{role}', [RoleController::class, 'update']);
    });
    Route::group(['middleware' => ['permission:delete-roles']], function () {
        Route::delete('/role/{role}', [RoleController::class, 'destroy']);
    });

    // Task routes
    Route::group(['middleware' => ['permission:view-tasks']], function () {
        Route::get('/tasks', [TaskController::class, 'index']);
        Route::get('/tasks/{task}', [TaskController::class, 'show']);
    });
    Route::group(['middleware' => ['permission:create-tasks']], function () {
        Route::post('/tasks', [TaskController::class, 'store']);
    });
    Route::group(['middleware' => ['permission:edit-tasks']], function () {
        Route::put('/tasks/{task}', [TaskController::class, 'update']);
    });
    Route::group(['middleware' => ['permission:delete-tasks']], function () {
        Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);
    });

    // TaskChange routes
    Route::group(['middleware' => ['permission:view-taskchanges']], function () {
        Route::get('/task_changes', [TaskChangeController::class, 'index']);
        Route::get('/task_changes/{taskChange}', [TaskChangeController::class, 'show']);
    });
});