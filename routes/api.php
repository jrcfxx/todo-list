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
    // restful - put -> recolocar obj naquele id, obj inteiro / patch - mais simples, atualizar só o que foi enviado
    Route::get('/users', [UsersController::class, 'index']);
    Route::post('/users', [UsersController::class, 'store']);
    Route::get('/users/{user}', [UsersController::class, 'show']);
    Route::put('/users/{user}', [UsersController::class, 'update']);
    Route::delete('/users/{user}', [UsersController::class, 'destroy']);

    // Role routes
    Route::get('/role', [TaskController::class, 'index']);
    Route::post('/role', [TaskController::class, 'store']);
    Route::get('/role/{role}', [TaskController::class, 'show']);
    Route::put('/role/{role}', [TaskController::class, 'update']);
    Route::delete('/role/{role}', [TaskController::class, 'destroy']);

    // Task routes
    Route::get('/tasks', [TaskController::class, 'index']);
    Route::post('/tasks', [TaskController::class, 'store']);
    Route::get('/tasks/{task}', [TaskController::class, 'show']);
    Route::put('/tasks/{task}', [TaskController::class, 'update']);
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);

    // TaskChange routes
    Route::get('/task_changes', [TaskChangeController::class, 'index']);
    Route::get('/task_changes/{taskChange}', [TaskChangeController::class, 'show']);

    });