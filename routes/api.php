<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiGuruController;
use App\Http\Controllers\ApiSiswaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::get('/guru', [ApiGuruController::class, 'index']);
// Route::get('/guru/{id}', [ApiGuruController::class, 'show']);

//post,get,lengkao deh
Route::apiResource('guru', ApiGuruController::class);

Route::apiResource('siswa', ApiSiswaController::class);
