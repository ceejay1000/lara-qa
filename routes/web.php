<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AnswersController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\FavouritesController;
use App\Http\Controllers\VoteAnswerController;
use App\Http\Controllers\AcceptAnswerController;
use App\Http\Controllers\VoteQuestionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [QuestionsController::class, 'index']);

Auth::routes();

Route::get('/questions/create', [QuestionsController::class, 'create'])->name('questions.create');
Route::get('/questions/{question:slug}', [QuestionsController::class, 'show'])->name('questions.show');

//Route::post('/questions/{questions}/answers', [AnswersController::class, 'store'])->name('answers.store');
Route::post('/answers/{answer}/accept', AcceptAnswerController::class)->name('answers.accept');
Route::resource('questions.answers', AnswersController::class)->only(['store', 'edit', 'update', 'destroy']);
Route::resource('questions', QuestionsController::class)->except(['create', 'show']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/questions/{question}/favourites', [FavouritesController::class, 'store'])->name('questions.favourite');
Route::delete('/questions/{question}/favourites', [FavouritesController::class, 'destroy'])->name('questions.unfavourite');

Route::post('/questions/{question}/vote', VoteQuestionController::class);

Route::post('/answers/{answer}/vote', VoteAnswerController::class);