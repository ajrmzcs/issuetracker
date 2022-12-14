<?php

use App\Http\Controllers\Api\IssueController;
use App\Http\Controllers\Api\TokenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/create-token', TokenController::class)->name('create.token');

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('issues', IssueController::class)->only('index');
});
