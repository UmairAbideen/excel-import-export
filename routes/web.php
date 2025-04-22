<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;


Route::get('/', [BookController::class, 'index']);
Route::post('/import', [BookController::class, 'import'])->name('books.import');
Route::get('/export', [BookController::class, 'export'])->name('books.export');
