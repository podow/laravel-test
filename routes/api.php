<?php

use App\Http\Controllers\Api\QuizController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Путь к апи для поллучения вопросов с вариантами ответа
Route::get('/quiz', [QuizController::class, 'index']);
Route::post('/quiz', [QuizController::class, 'store']);
