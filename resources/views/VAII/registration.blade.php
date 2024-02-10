<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('assets/CSS/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('assets/CSS/loginRegistration.css')}}">
</head>
<body>
@include('layouts.header')
<div class="content">
    <div class="form-container">
        <form id="registrationForm" action="/registration" method="post">
            @csrf
            <input name="name" class="box justify-content-center align-content-center" type="text" placeholder="Username"><br>
            <input name="email" id="email" class="box justify-content-center align-content-center" type="email" placeholder="Email"><br>
            <input name="password" class="box justify-content-center align-content-center" type="password" placeholder="Heslo"><br>
            <div class="box justify-content-center align-content-center">
                <button onclick="validateRegistrationForm(event)">Registrovať</button>
            </div>
        </form>
        <div class="links-container">
            <a class="links" href="/login">Prihlásiť sa</a>

            <a class="links" href="/">Návrat na domovskú stránku</a>
        </div>
    </div>
</div>


@include('layouts.footer')
<script src="{{asset('assets/JS/script.js')}}"></script>
</body>
</html>
