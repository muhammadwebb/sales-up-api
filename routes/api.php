<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BotController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\MarketingController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SourceController;
use App\Http\Controllers\StatusController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/getme', [AuthController::class, 'getme'])->middleware(['auth:sanctum']);

Route::middleware(['auth:sanctum'])->group(function (){
    Route::post('is-active', [CompanyController::class, 'isActive']);
    Route::post('messages-all', [MessageController::class, 'send_all']);

    Route::apiResources([
        'companies' => CompanyController::class,
        'courses' => CourseController::class,
        'statuses' => StatusController::class,
        'bots' => BotController::class,
        'marketing' => MarketingController::class,
        'sources' => SourceController::class,
        'links' => LinkController::class,
        'leads' => LeadController::class,
        'orders' => OrderController::class,
        'messages' => MessageController::class
    ]);
});
