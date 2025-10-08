<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/test', function () {
    return response()->json(['message' => 'API is working!']);
});
// Student routes
Route::get('/students', [App\Http\Controllers\StudentController::class, 'index']);
Route::get('/students/{id}', [App\Http\Controllers\StudentController::class, 'show']);
Route::post('/students', [App\Http\Controllers\StudentController::class, 'store']);
Route::put('/students/{id}', [App\Http\Controllers\StudentController::class, 'update']);
Route::delete('/students/{id}', [App\Http\Controllers\StudentController::class, 'destroy']);

// Learningstrand routes
Route::get('/learningstrands', [App\Http\Controllers\LearningstrandController::class, 'index']);
Route::get('/learningstrands/{id}', [App\Http\Controllers\LearningstrandController::class, 'show']);
Route::post('/learningstrands', [App\Http\Controllers\LearningstrandController::class, 'store']);
Route::put('/learningstrands/{id}', [App\Http\Controllers\LearningstrandController::class, 'update']);
Route::delete('/learningstrands/{id}', [App\Http\Controllers\LearningstrandController::class, 'destroy']);