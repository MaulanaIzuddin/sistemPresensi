<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::middleware('role:mahasiswa')->get('/test-mahasiswa', function (Request $request) {
        return response()->json([
            'message' => 'Akses mahasiswa berhasil.',
            'user' => $request->user(),
        ]);
    });
});
