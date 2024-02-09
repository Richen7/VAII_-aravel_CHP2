<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adder</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('assets/CSS/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('assets/CSS/book-info.css')}}">
</head>

<body>
@include('layouts.header')
<script src="{{asset('assets/JS/script.js')}}"></script>

<div class="content">
    <div class="container">
        <div class="book-detail">
            <h2 class="book-title">{{ $book->title }}</h2>
            <div class="book-info">
                <img src="{{ Storage::url('images/' . $book->image) }}" alt="Obrázok knihy {{ $book->title }}" class="book-image">
                <div class="book-text-details">
                    <p class="book-author">Autor: {{ $book->author }}</p>
                    <p class="book-description">Popis: {{ $book->description }}</p>
                    <p class="book-setting">Prostredie: {{ $book->setting->name }} ({{ $book->setting->short }})</p>
                </div>
            </div>
            <div class="book-purchase-info">
                <button class="add-to-cart-btn">Pridaj do košíka</button>
                <span class="book-price">Cena: {{ $book->price }} €</span>
            </div>
        </div>
    </div>
</div>


@include('layouts.footer')
</body>
</html>
