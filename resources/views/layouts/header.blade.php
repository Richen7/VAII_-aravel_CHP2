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
                <li class="nav-item dropdown">
                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">Produkty</a>
                    <div class="dropdown-menu">
                        @foreach($settings as $setting)
                            <a href="{{ route('books.filter', ['setting' => $setting->id]) }}" class="dropdown-item">{{ $setting->short }}</a>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item">
                    <a href="/about">O nás</a>
                </li>
                <li class="nav-item cart-info">
                    <a href="{{ route('checkout') }}">
                        <i class="fa fa-shopping-cart"></i>
                        <span class="cart-items-count">0</span> |
                        <span class="cart-total-price">0 €</span>
                    </a>
                </li>
                <li class="nav-item">
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
                <li class="nav-item dropdown">
                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">Produkty</a>
                    <div class="dropdown-menu">
                        @foreach($settings as $setting)
                            <a href="{{ route('books.filter', ['setting' => $setting->id]) }}" class="dropdown-item">{{ $setting->short }}</a>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item">
                    <a href="/about">O nás</a>
                </li>
                <li class="nav-item cart-info">
                    <a href="{{ route('checkout') }}">
                        <i class="fa fa-shopping-cart"></i>
                        <span class="cart-items-count">0</span> |
                        <span class="cart-total-price">0 €</span>
                    </a>
                </li>
                <li class="nav-item">
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
