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
<header>
    @auth
        <nav class="navbar">
            <a href="/">
                <img src="{{asset('assets/Images/logo_header.jpg')}}" alt="logo knihkupectva">
            </a>
            <ul class="nav-menu text-center align-items-center justify-content-center">
                <li class="nav-item">
                    <a href="/">Domov</a>
                </li>
                <li class="nav-item">
                    <a href="#">Produkty</a>
                </li>
                <li class="nav-item">
                    <a href="/about">O nás</a>
                </li>
                <li class="link_login nav-item">
                    <form action="/adder" method="post">
                        @csrf
                        <a href="#" onclick="document.forms[0].submit();">Účet</a>
                    </form>
                </li>
                <li class="nav-item">
                    <form action="/logout" method="post">
                        @csrf
                        <a href="#" onclick="document.forms[1].submit();">Odhlásiť</a>
                    </form>
                </li>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    @else
        <nav class="navbar">
            <a href="/">
                <img src="{{asset('assets/Images/logo_header.jpg')}}" alt="logo knihkupectva">
            </a>
            <ul class="nav-menu text-center align-items-center justify-content-center">
                <li class="nav-item">
                    <a href="/">Domov</a>
                </li>
                <li class="nav-item">
                    <a href="#">Produkty</a>
                </li>
                <li class="nav-item">
                    <a href="/about">O nás</a>
                </li>
                <li class="link_login nav-item">
                    <a href="/login">Prihlásenie</a>
                </li>
                <li class="nav-item">
                    <a href="/registration">Registrovať</a>
                </li>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    @endauth
</header>
<script src="{{asset('assets/JS/script.js')}}"></script>

<div class="content text-center">

    @auth
        <div style="border: 3px solid black">
            <h2>Add a new Book</h2>
            <form id="addBookForm" action="/add-book" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" name="title" id="title" placeholder="book title"><br>
                <textarea name="description" id="description" placeholder="description of book"></textarea><br>
                <input type="text" name="author" id="author" placeholder="author"><br>
                <input type="text" name="price" id="price" placeholder="price"><br>
                <input type="file" name="image" id="image"><br>
                <button onclick="validateAdderForm(event)">Pridaj knihu</button>
            </form>
        </div>
    @endauth

</div>


<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <p class="who">
                    WHK je nakladatelstvo špecializujúce sa na
                    preklad kníh zo sérií
                    Warhammer fantasy, Warhammer 40k a Warhammer AOS.
                </p>
            </div>
            <div class="col-sm">
                <p class="contact">
                    <img src="{{asset('assets/Images/mail_footer.jpg')}}" alt="obrazok obalky">
                    r.juras77@gmail.com
                </p>
                <p class="contact">
                    <img class="footer_img" src="{{asset('assets/Images/phone_footer.jpg')}}" alt="obrazok telefónu">
                    +421 915 667 ***
                </p>
            </div>
            <div class="col-sm">
                <p class="credits">
                    Richard Juráš  © 2023
                </p>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
