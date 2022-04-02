<?php

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

use App\Http\Controllers\Admin\AdminApi;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'admin'], function() {

    Route::group(['prefix' => 'question-bank'], function() {
        Route::post('/save', [AdminApi::class, 'save_question_bank']);
        // Route::post('/{id}/add', [AdminApi::class, 'add_question_to_question_bank']);
        Route::post('/{id}/add/chapter', [AdminApi::class, 'add_chapter_to_question_bank']);
        Route::post('/{question_bank_id}/chapter/{chapter_id}/add/question', [AdminApi::class, 'add_question_to_chapter']);
        Route::get('/{question_bank_id}/chapter/{chapter_id}/get/questions', [AdminApi::class, 'get_questions']);
        Route::post('/{question_bank_id}/remove/chapter/{chapter_id}', [AdminApi::class, 'remove_chapter']);
        Route::post('/chapter/{chapter_id}/question/remove/{id}', [AdminApi::class, 'remove_question']);
    });
    
});