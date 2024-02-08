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
            'price' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Voliteľná validácia obrázka
        ]);

        // Ostatné polia ako predtým
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['description'] = strip_tags($incomingFields['description']);
        $incomingFields['author'] = strip_tags($incomingFields['author']);
        $incomingFields['price'] = strip_tags($incomingFields['price']);

        // Uloženie obrázka, ak bol odoslaný
        if($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $incomingFields['image'] = basename($imagePath); // Aktualizujte cestu k obrázku
        }

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
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Pridaná validácia obrázka
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['description'] = strip_tags($incomingFields['description']);
        $incomingFields['author'] = strip_tags($incomingFields['author']);
        $incomingFields['price'] = strip_tags($incomingFields['price']);
        $incomingFields['user_id'] = auth()->id();

        // Uloženie obrázka, ak bol odoslaný
        if($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $incomingFields['image'] = basename($imagePath);
        }


        Book::query()->create($incomingFields);

        return redirect('/');
    }
}

