<?php

use App\Http\Controllers\Api\TaskController as ApiTaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(middleware: 'auth:sanctum')->group(function(): void{
    Route::apiResource("/tasks", ApiTaskController::class);
});

Route::post(uri: "Login", action: [LoginController::class, "login"]);
Route::post(uri: "Logout", action: [LoginController::class, "Logout"]);