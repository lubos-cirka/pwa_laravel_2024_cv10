<?php

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
    return view('index'); // return view('welcome');
});

Route::get('/index', function () {
    return view('index');
})->name('index');

Route::get('/authors', [App\Http\Controllers\AuthorController::class, 'index'])->name('authors.index');

Route::middleware(['auth'])->group(function () {   
    Route::resource('/books', App\Http\Controllers\BookController::class);
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
