<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ChatController;
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

Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/projects', [ProjectController::class, 'indexApi']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/chat/fetch/{projectId}/{userId}', [ChatController::class, 'fetch']);
    Route::post('/chat/send', [ChatController::class, 'send']);
});

Route::get(
  '/chat/last-message/{projectId}',
  [ChatController::class, 'lastMessage']
)->middleware('auth:sanctum');
