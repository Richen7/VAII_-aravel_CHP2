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
    <link rel="stylesheet" href="{{asset('assets/CSS/account.css')}}">
    <script src="{{asset('assets/JS/script.js')}}"></script>
</head>
<body>
@include('layouts.header')
<div class="content">
    <div class="container2 mt-4">
        <h2>Účet Používateľa</h2>
        <div class="col-md-6">
            <form id="userUpdateForm" class="form-account" action="{{ route('user.update') }}" method="POST" onsubmit="validateUserUpdateForm(event)">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Meno</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Nové heslo</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Potvrďte heslo</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>
                <button type="submit" class="btn btn-primary">Uložiť zmeny</button>
            </form>
        </div>
        @if(auth()->user()->admin == 1)
            <a href="{{ url('/adder') }}" class="btn btn-success mt-3">Pridaj knihu</a>
        @endif
    </div>
</div>



@include('layouts.footer')
</body>
</html>
