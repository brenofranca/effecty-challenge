<?php

use App\Http\Controllers\LicitationDetailsController;
use App\Http\Controllers\LicitationRecentController;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\SignOutController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [SignInController::class, 'post']);

Route::post('/logout', [SignOutController::class, 'post'])->middleware('auth:sanctum');

Route::get('/licitation/recents', [LicitationRecentController::class, 'get'])->middleware('auth:sanctum');

Route::get('/licitation/{id}', [LicitationDetailsController::class, 'get'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});

