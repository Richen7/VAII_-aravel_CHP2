<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('assets/CSS/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('assets/CSS/master.css')}}">
</head>
<body>
@include('layouts.header')
<div class="content">
    <h2>{{ $setting->name }}</h2>
    <div class="container">
        @foreach($books as $book)
            <div class="book-item">
                <img class="book-image" src="{{ asset('storage/images/' . $book->image) }}" alt="Obrázok knihy">
                <div class="book-info">
                    <h3 class="book-title">{{ $book->title }}</h3>
                    <p class="book-author">Autor: {{ $book->author }}</p>
                    <p class="book-price">Cena: {{ $book->price }} €</p>
                    <a href="{{ url('/books/info', $book->id) }}" class="book-info-btn">Info</a>
                    @if(auth()->check() && auth()->user()->admin == 1)
                        <a href="/edit-book/{{$book->id}}" class="book-edit">Edit</a>
                        <form action="/delete-book/{{$book->id}}" method="POST" onsubmit="return confirm('Vážne chcete zmazať tento produkt?');">
                            @csrf
                            @method('DELETE')
                            <button class="book-delete">DELETE</button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
@include('layouts.footer')
<script src="{{asset('assets/JS/script.js')}}"></script>
</body>
</html>
