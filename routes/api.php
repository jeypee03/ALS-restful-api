<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/test', function () {
    return response()->json(['message' => 'API is working!']);
});

Route::get('/students', [App\Http\Controllers\StudentController::class, 'index']);
Route::get('/students/{id}', [App\Http\Controllers\StudentController::class, 'show']);
Route::post('/students', [App\Http\Controllers\StudentController::class, 'store']);
Route::put('/students/{id}', [App\Http\Controllers\StudentController::class, 'update']);
Route::delete('/students/{id}', [App\Http\Controllers\StudentController::class, 'destroy']);