<!-- Add this to your resources/views/home/header.blade.php file -->
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                <div class="full">
                    <div class="center-desk">
                        <div class="logo">
//CreateEvents
                            <a href="/"><img src="images/logo.png" alt="#" /></a>

                            <a href="{{ url('/') }}"><img src="images/logo.png" alt="#" /></a>
//main
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
 // CreateEvents
                <nav class="navigation navbar navbar-expand-md navbar-dark">

                <nav class="navigation navbar navbar-expand-md navbar-dark ">
// main
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarsExample04">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
//CreateEvents
                                <a class="nav-link" href="/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#about">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#room">Rooms</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#gallery">Gallery</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#blog">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#contact">Contact</a>
                            </li>

                            @if (Route::has('login'))
                                @auth
                                    @if(Auth::user()->usertype == 'admin')
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('/home') }}">Dashboard</a>
                                        </li>
                                    @endif
                                    <li class="nav-item">
                                        <span class="nav-link">{{ Auth::user()->name }}</span>
                                    </li>
                                    <li class="nav-item">
                                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-link nav-link">
                                                Logout
                                            </button>
                                        </form>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                                        </li>
                                    @endif
                                @endauth
                            @endif

                                <a class="nav-link" href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about.html">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="room.html">Our Event</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="gallery.html">Gallery</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.html">Contact Us</a>
                            </li>

                            <!-- Lien pour les utilisateurs authentifiés -->
                            @auth
                                <li class="nav-item">
                                @auth
    <li class="nav-item">
        <!-- Formulaire pour se déconnecter avec la méthode POST -->
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf <!-- Token CSRF nécessaire pour sécuriser le formulaire -->
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </li>
@endauth

                                </li>
                            @else
                                <!-- Lien pour les utilisateurs non authentifiés -->
                                <li class="nav-item" style="padding-right:10px;">
                                    <a class="btn btn-success" href="{{ url('login') }}">Log in</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="btn btn-primary" href="{{ url('register') }}">Register</a>
                                    </li>
                                @endif
                            @endauth
// main
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
