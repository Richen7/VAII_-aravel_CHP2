<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use PHPUnit\Metadata\PostCondition;
use App\Models\Book;

class BookController extends Controller
{
    public function showAdder() {
        return redirect('/adder');
    }

    public function showBookInfo(Book $book) {
        return view('VAII.book-info', ['book' => $book]);
    }

    public function deleteBook (Book $book) {
        $book->delete();
        return redirect('/');
    }

    public function updateBook(Book $book, Request $request) {
        if (auth()->user()->id !==  $book['user_id']){
            return redirect('/');
        }

        $incomingFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'author' => 'required',
            'price' => 'required',
            'setting_id' => 'required|exists:setting,id',
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['description'] = strip_tags($incomingFields['description']);
        $incomingFields['author'] = strip_tags($incomingFields['author']);
        $incomingFields['price'] = strip_tags($incomingFields['price']);

        if ($request->hasFile('image')) { // Zmena z 'book_image' na 'image'
            $imagePath = $request->file('image')->store('public/images');
            $incomingFields['image'] = basename($imagePath);
        } else {
            unset($incomingFields['image']);
        }

        $book->update($incomingFields);
        return redirect('/')->with('message', 'Book updated successfully!');
    }

    public function showEditScreen(Book $book) {
        if (auth()->user()->id !==  $book['user_id']){
            return redirect('/');
        }
        return view('VAII.edit-book', ['book' => $book]);
    }

    public function addBook(Request $request){
        $incomingFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'author' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'setting_id' => 'required|exists:setting,id',
        ]);

        $incomingFields = array_map('strip_tags', $incomingFields);
        $incomingFields['user_id'] = auth()->id();

        if($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $incomingFields['image'] = basename($imagePath);
        }

        Book::create($incomingFields);

        return redirect('/');
    }
}

