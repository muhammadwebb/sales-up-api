<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CourseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/getme', [AuthController::class, 'getme'])->middleware(['auth:sanctum']);

Route::middleware(['auth:sanctum'])->group(function (){
    Route::apiResources([
        'companies' => CompanyController::class,
        'courses' => CourseController::class
    ]);
});
