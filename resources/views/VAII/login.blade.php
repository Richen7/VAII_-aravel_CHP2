<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('assets/CSS/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('assets/CSS/loginRegistration.css')}}">
</head>



<body>
@include('layouts.header')
<script src="{{asset('assets/JS/script.js')}}"></script>

<div class="content">
    <div class="form-container">
        <form action="/login" method="post">
            @csrf
            <input name="loginname" class="box justify-content-center align-content-center" type="text" placeholder="Username" ><br>
            <input name="loginpassword" class="box justify-content-center align-content-center" type="password" placeholder="Heslo" ><br>
            <div class="box justify-content-center align-content-center">
                <button>Prihlásiť sa</button>
            </div>
        </form>
    </div>
</div>


@include('layouts.footer')
</body>

</html>
