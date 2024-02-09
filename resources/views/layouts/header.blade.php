<header>
    @auth
        <nav class="navbar">
            <a href="/">
                <img src="{{ asset('assets/Images/logo_header.jpg') }}" alt="logo knihkupectva">
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
                    <a href="{{ url('/account/' . auth()->user()->id) }}">Účet</a>
                </li>
                <li class="nav-item">
                    <form action="/logout" method="post">
                        @csrf
                        <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">Odhlásiť</a>
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
                <img src="{{ asset('assets/Images/logo_header.jpg') }}" alt="logo knihkupectva">
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
                <span the="bar"></span>
                <span the="bar"></span>
            </div>
        </nav>
    @endauth
</header>
