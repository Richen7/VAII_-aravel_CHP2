<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdderController;
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
Route::post('/adder', [AdderController::class, 'showAdder']);
Route::post('/login', [UserController::class, 'login']);


Route::post('/add-book', [AdderController::class, 'addBook']);
Route::get('/edit-book/{book}',[AdderController::class, 'showEditScreen']);
Route::put('/edit-book/{book}',[AdderController::class, 'updateBook']);
Route::delete('/delete-book/{book}',[AdderController::class, 'deleteBook']);
