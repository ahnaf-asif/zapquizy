<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::get('/model-test', [AdminController::class, 'model_tests'])->name('admin.model.tests');

    // question banks
    Route::group(['prefix' => 'question-bank'], function() {
        Route::get('', [AdminController::class, 'question_banks'])->name('admin.question.banks');
	    Route::get('/new', [AdminController::class, 'new_question_bank'])->name('admin.new.question.bank');
	    Route::post('/new/add', [AdminController::class, 'new_question_bank_add'])->name('admin.add.new.question.bank');
	    Route::get('/delete/{id}', [AdminController::class, 'delete_question_bank'])->name('admin.delete.question.bank');
	    Route::get('/visit/{id}', [AdminController::class, 'visit_question_bank'])->name('visit.question.bank');
    });
    

});