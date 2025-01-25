<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Relay1StatusController;
use App\Http\Controllers\Api\Relay2StatusController;
use App\Http\Controllers\Api\Relay3StatusController;
use App\Http\Controllers\Api\Relay4StatusController;
use App\Http\Controllers\Api\Relay5StatusController;
use App\Http\Controllers\Api\Relay6StatusController;
use App\Http\Controllers\Api\Relay7StatusController;
use App\Http\Controllers\Api\Relay8StatusController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::post('/register', [AuthController::class, 'register']);
Route::get('/try', [AuthController::class, 'try']);
Route::post('/login', [AuthController::class, 'login']);
Route::apiResource('/first-relay',Relay1StatusController::class)->middleware('auth:sanctum');
Route::apiResource('/second-relay',Relay2StatusController::class)->middleware('auth:sanctum');
Route::apiResource('/third-relay',Relay3StatusController::class)->middleware('auth:sanctum');
Route::apiResource('/fourth-relay',Relay4StatusController::class)->middleware('auth:sanctum');
Route::apiResource('/fifth-relay',Relay5StatusController::class)->middleware('auth:sanctum');
Route::apiResource('/sixth-relay',Relay6StatusController::class)->middleware('auth:sanctum');
Route::apiResource('/seventh-relay',Relay7StatusController::class)->middleware('auth:sanctum');
Route::apiResource('/eighth-relay',Relay8StatusController::class)->middleware('auth:sanctum');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth:sanctum');
