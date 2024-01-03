<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/books', [\App\Http\Controllers\BookController::class,'index'])->name('books.index');
Route::get('/journals', [\App\Http\Controllers\JournalController::class,'index'])->name('journals.index');
Route::get('/articles', [\App\Http\Controllers\ArticleController::class,'index'])->name('articles.index');
Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class,'index'])->name('dashboard.index');
Route::post('/dashboard/store', [DashboardController::class, 'store'])->name('dashboard.store');
Route::post('/dashboard/storearticle', [DashboardController::class, 'storeArticle'])->name('dashboard.storeArticle');
Route::post('/dashboard/storejournal', [DashboardController::class, 'storeJournal'])->name('dashboard.storejournal');
Route::get('/dashboard/addbook', [\App\Http\Controllers\DashboardController::class,'addbook'])->name('dashboard.addbook');
Route::get('/dashboard/addarticle', [\App\Http\Controllers\DashboardController::class,'addArticle'])->name('dashboard.addarticle');
Route::get('/dashboard/addjournal', [\App\Http\Controllers\DashboardController::class,'addJournal'])->name('dashboard.addjournal');
Route::delete('/dashboard/delete-book/{id}', [DashboardController::class, 'deleteBook'])->name('dashboard.deleteBook');
Route::delete('/dashboard/delete-article/{id}', [DashboardController::class, 'deleteArticle'])->name('dashboard.deleteArticle');
Route::delete('/dashboard/delete-journal/{id}', [DashboardController::class, 'deleteJournal'])->name('dashboard.deleteJournal');

Route::get('/dashboard/books/edit/{id}', [DashboardController::class, 'editBook'])->name('dashboard.editBook');
Route::get('/dashboard/articles/edit/{id}', [DashboardController::class, 'editArticle'])->name('dashboard.editArticle');
Route::get('/dashboard/journals/edit/{id}', [DashboardController::class, 'editJournal'])->name('dashboard.editJournal');
Route::put('/dashboard/updateBook/{id}', [DashboardController::class, 'updateBook'])->name('dashboard.updateBook');
Route::put('/dashboard/updateArticle/{id}', [DashboardController::class, 'updateArticle'])->name('dashboard.updateArticle');
Route::put('/dashboard/updateJournal/{id}', [DashboardController::class, 'updateJournal'])->name('dashboard.updateJournal');
Route::get('/download/book/{id}', [\App\Http\Controllers\BookController::class,'download'])->name('download.book');
