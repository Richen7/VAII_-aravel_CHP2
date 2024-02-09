<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SettingController;
use App\Models\Book;
use App\Models\User;

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
Route::get('/account/{user}', function (User $user) {
    if (auth()->check() && (auth()->user()->id == $user->id || auth()->user()->admin)) {
        return view('VAII.account', compact('user'));
    } else {
        abort(403, 'Neoprávnený prístup.');
    }
})->middleware('auth');


Route::post('/registration', [UserController::class, 'registration']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/adder', [BookController::class, 'showAdder']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/account/update', [UserController::class, 'update'])->name('user.update');


Route::post('/add-book', [BookController::class, 'addBook']);
Route::get('/edit-book/{book}',[BookController::class, 'showEditScreen']);
Route::put('/edit-book/{book}',[BookController::class, 'updateBook']);
Route::get('/books/info/{book}', [BookController::class, 'showBookInfo'])->name('books.info');
Route::delete('/delete-book/{book}',[BookController::class, 'deleteBook']);
Route::get('/books/{id}', [BookController::class, 'show']);

