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
    <link rel="stylesheet" href="{{asset('assets/CSS/adder.css')}}">
</head>
<body>
@include('layouts.header')
<script src="{{asset('assets/JS/script.js')}}"></script>

<div class="content text-center">

    @auth
        <div style="border: 3px solid black">
            <h2>Add a new Book</h2>
            <form id="addBookForm" action="{{url('/add-book')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" name="title" id="title" placeholder="book title"><br>
                <textarea name="description" id="description" placeholder="description of book"></textarea><br>
                <input type="text" name="author" id="author" placeholder="author"><br>
                <input type="text" name="price" id="price" placeholder="price"><br>
                <label for="genre">Prostredie:</label>
                <select name="setting_id" id="setting_id">
                    <option value="2">Fantasy</option>
                    <option value="1">Age Of Sigmar</option>
                    <option value="3">40 Thousand</option>
                </select>
                <input type="file" name="image" id="image"><br>
                <button type="submit" onclick="validateAdderForm(event)">Pridaj knihu</button>
            </form>
        </div>
    @endauth

</div>


@include('layouts.footer')
</body>
</html>
