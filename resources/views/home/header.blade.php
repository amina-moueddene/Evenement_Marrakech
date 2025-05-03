<!-- header inner -->
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                <div class="full">
                    <div class="center-desk">
                        <div class="logo">
                            <a href="{{ url('/') }}"><img src="images/logo.png" alt="#" /></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                <nav class="navigation navbar navbar-expand-md navbar-dark">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarsExample04">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about.html">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="event.html">Our Event</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="gallery.html">Gallery</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.html">Contact Us</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-bell fs-4"></i>
                                    <span id="notification-count" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="display: none;">
                                        0
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" style="width: 320px; max-height: 400px; overflow-y: auto;">
                                    <div class="dropdown-header d-flex justify-content-between align-items-center">
                                        <span class="fw-bold">Notifications</span>
                                        <button id="mark-all-read" class="btn btn-sm btn-link text-decoration-none">Tout marquer comme lu</button>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <div id="notifications-list" class="p-0">
                                        <div class="p-3 text-center">
                                            <div class="spinner-border spinner-border-sm text-primary" role="status">
                                                <span class="visually-hidden">Chargement...</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- Lien pour les utilisateurs authentifiés -->
                            @auth
                                @if(Auth::user()->usertype === 'user')
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle btn btn-secondary text-black" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Settings
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ url('/profile') }}">Profile</a>
                                            <form action="{{ route('logout') }}" method="POST">
                                                @csrf
                                                <button type="submit" class="dropdown-item">Logout</button>
                                            </form>
                                        </div>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Logout</button>
                                        </form>
                                    </li>
                                @endif
                            @else
                                <!-- Utilisateur non authentifié -->
                                <li class="nav-item" style="padding-right:10px;">
                                    <a class="btn btn-success" href="{{ url('login') }}">Log in</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="btn btn-primary" href="{{ url('register') }}">Register</a>
                                    </li>
                                @endif
                            @endauth
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>