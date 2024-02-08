<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SettingController;
use App\Models\Book;

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

Route::get('/login', function () {
    return view('VAII.login');
});
Route::get('/', function () {
    $books = Book::all();
    return view('VAII.master', ['books' => $books]);
});
Route::get('/registration', function () {
    return view('VAII.registration');
});
Route::get('/about', function () {
    return view('VAII.aboutMe');
});
Route::get('/adder', function () {
    return view('VAII.adder');
});


Route::post('/registration', [UserController::class, 'registration']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/adder', [BookController::class, 'showAdder']);
Route::post('/login', [UserController::class, 'login']);


Route::post('/add-book', [BookController::class, 'addBook']);
Route::get('/edit-book/{book}',[BookController::class, 'showEditScreen']);
Route::put('/edit-book/{book}',[BookController::class, 'updateBook']);
Route::delete('/delete-book/{book}',[BookController::class, 'deleteBook']);

//Route::get('/create-settings', [SettingController::class, 'create']);
