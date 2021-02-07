<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionsController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/questions/create', [QuestionsController::class, 'create'])->name('questions.create');
Route::get('/questions/{question:slug}', [QuestionsController::class, 'show'])->name('questions.show');


Route::resource('questions', QuestionsController::class)->except(['create', 'show']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 