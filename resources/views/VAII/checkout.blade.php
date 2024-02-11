<!DOCTYPE html>
<html lang="en" >
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
    <link rel="stylesheet" href="{{asset('assets/CSS/checkout.css')}}">
</head>

<body>
@include('layouts.header')
<div class="content">
    <div class="container">
        <h2>Doručovací údaje</h2>
        <form action="{{ route('checkout') }}" method="POST" class="checkout-form" onsubmit="validateCheckoutForm(event)">
            @csrf
            <div class="form-group">
                <label for="firstname">Meno *</label>
                <input type="text" id="firstname" name="firstname" required>

                <label for="lastname">Priezvisko *</label>
                <input type="text" id="lastname" name="lastname" required>
            </div>

            <div class="form-group">
                <label for="email">E-mail *</label>
                <input type="email" id="email" name="email" required>

                <label for="phone">Telefón *</label>
                <input type="tel" id="phone" name="phone" pattern="\d*" required>
            </div>

            <div class="form-group">
                <label for="Street">Ulica *</label>
                <input type="text" id="street" name="street" required>

                <label for="City">Mesto *</label>
                <input type="text" id="city" name="city" required>
            </div>

            <div class="form-group">
                <label for="note">Poznámka ku objednávke</label>
                <textarea id="note" name="note"></textarea>
            </div>

            <button type="submit" class="btn">Odoslať objednávku</button>
        </form>
    </div>
</div>


@include('layouts.footer')
<script src="{{asset('assets/JS/script.js')}}"></script>
</body>
</html>
