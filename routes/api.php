<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Api\QuestionsController;
use App\Http\Controllers\Api\AnswersController;
use App\Http\Controllers\Api\QuestionDetailsController;
use App\Http\Controllers\Api\VoteQuestionController;
use App\Http\Controllers\Api\VoteAnswerController;
use App\Http\Controllers\Api\AcceptAnswerController;
use App\Http\Controllers\Api\FavoritesController;

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


Route::post('/token', [LoginController::class, 'getToken']);
Route::get('/questions', [QuestionsController::class, 'index']);
Route::get('/questions/{question}/answers', [AnswersController::class, 'index']);

Route::get('/questions/{question}-{slug}', QuestionDetailsController::class);

Route::middleware('auth:api')->group(function () {
    Route::apiResource('/questions', QuestionsController::class)->except('index');
    Route::apiResource('/questions.answers', AnswersController::class)->except('index');
    Route::post('/questions/{question}/vote', VoteQuestionController::class);
    Route::post('/answers/{answer}/vote', VoteAnswerController::class);
    Route::post('/answers/{answer}/accept', AcceptAnswerController::class);
    Route::post('/questions/{question}/favorites',  [FavoritesController::class, 'store']);
    Route::delete('/questions/{question}/favorites',  [FavoritesController::class, 'destroy']);

});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
