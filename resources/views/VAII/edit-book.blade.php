<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Adder</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('assets/CSS/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('assets/CSS/edit-book.css')}}">
</head>

<body>
@include('layouts.header')

<div class="content text-center">

    @auth
        <div>
            <h2>Edit Book</h2>
            <form id="editBookForm" action="/edit-book/{{$book->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="text" name="title" id="title" value="{{$book->title}}"><br>
                <textarea name="description" id="description">{{$book->description}}</textarea><br>
                <input type="text" name="author" id="author" value="{{$book->author}}"><br>
                <input type="text" name="price" id="price" value="{{$book->price}}"><br>

                <select name="setting_id" id="setting_id">
                    <option value="1" {{$book->setting_id == 1 ? 'selected' : ''}}>Age Of Sigmar</option>
                    <option value="2" {{$book->setting_id == 2 ? 'selected' : ''}}>Fantasy</option>
                    <option value="3" {{$book->setting_id == 3 ? 'selected' : ''}}>40 Thousand</option>
                </select><br>

                <input type="file" name="book_image" id="book_image">

                <button type="submit" onsubmit="validateEditForm(event)">Ulož zmeny</button>
            </form>
        </div>
    @endauth

</div>


@include('layouts.footer')
<script src="{{asset('assets/JS/script.js')}}"></script>
</body>
</html>
