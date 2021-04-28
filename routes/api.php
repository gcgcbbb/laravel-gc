<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
        QuestionsController,
        AnswersController,
        QuestionDetailsController,
        VoteQuestionController,
        VoteAnswerController,
        AcceptAnswerController,
        FavoritesController,
        MyPostsController
    };
use App\Http\Controllers\Api\Auth\{
        LoginController,
        RegisterController
};

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


Route::post('/login', [LoginController::class, 'store']);
Route::delete('/logout', [LoginController::class, 'destroy'])->middleware('auth.api');
Route::post('/register', RegisterController::class);

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
    Route::get('/my-posts', MyPostsController::class);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
