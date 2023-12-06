<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use PHPUnit\Metadata\PostCondition;
use App\Models\Book;

class AdderController extends Controller
{
    public function showAdder() {
        return redirect('/adder');
    }

    public function deleteBook (Book $book) {
        if (auth()->user()->id ===  $book['user_id']){
            $book->delete();
        }
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
            'price' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['description'] = strip_tags($incomingFields['description']);
        $incomingFields['author'] = strip_tags($incomingFields['author']);
        $incomingFields['price'] = strip_tags($incomingFields['price']);

        $book->update($incomingFields);
        return redirect('/');
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
            'price' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['description'] = strip_tags($incomingFields['description']);
        $incomingFields['author'] = strip_tags($incomingFields['author']);
        $incomingFields['price'] = strip_tags($incomingFields['price']);
        $incomingFields['user_id'] = auth()->id();
        Book::query()->create($incomingFields);

        return redirect('/');
    }

}

