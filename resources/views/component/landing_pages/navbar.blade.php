<!-- Navbar start -->
<div class="container-fluid sticky-top px-0">
    <div class="container-fluid topbar d-none d-lg-block">
        <div class="container px-0">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="d-flex flex-wrap">
                        <a href="#" class="me-4 text-light"><i class="fas fa-map-marker-alt text-primary me-2"></i>Semarang, Indonesia</a>
                        <a href="#" class="me-4 text-light"><i class="fas fa-phone-alt text-primary me-2"></i>+62 858-7507-6399</a>
                        <a href="#" class="text-light"><i class="fas fa-envelope text-primary me-2"></i> gravidaku9@gmail.com</a>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="d-flex align-items-center justify-content-end">
                        <a href="#" class="me-3 btn-square border rounded-circle nav-fill"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="me-3 btn-square border rounded-circle nav-fill"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="me-3 btn-square border rounded-circle nav-fill"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="btn-square border rounded-circle nav-fill"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-light">
        <div class="container px-0">
            <nav class="navbar navbar-light navbar-expand-xl">
                <a href="" class="navbar-brand">
                    <h1 class="text-primary display-4">Gravida</h1>
                </a>
                <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse bg-light py-3" id="navbarCollapse">
                    <div class="navbar-nav mx-auto border-top">
                        <a href="/" class="nav-item nav-link active">Home</a>
                        <a href="/artikel" class="nav-item nav-link">Artikel</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Tools</a>
                            <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                <a href="/tools/hitung-hpl" class="dropdown-item">Hitung HPL</a>
                            </div>
                        </div>
                        <a href="/about" class="nav-item nav-link">About</a>
                        <a href="/contact" class="nav-item nav-link">Contact Us</a>
                    </div>

                    @auth
                        <ul class="navbar-nav d-none d-lg-flex">
                            <li class="nav-item dropdown">
                            <a
                                href="#"
                                class="nav-link"
                                id="navbarDropdown"
                                role="button"
                                data-toggle="dropdown"
                                
                            >
                                {{-- <img
                                src="/images/icon-user.png"
                                alt=""
                                class="rounded-circle mr-2 profile-picture"
                                /> --}}
                                
                                <i class="fas fa-user-circle rounded-circle profile-picture" style="font-size: 25px; margin-right: 2px; margin-top: 5px;"></i>
                                Hi, {{ Auth::user()->fullname }}
                            </a>
                            <div class="dropdown-menu">
                                <a href="/dashboard-account.html" class="dropdown-item"
                                >Settings</a
                                >
                                <div class="dropdown-divider"></div>
                                <a href="#"href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); 
                                    document.getElementById('logout-form').submit();" class="dropdown-item">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none; ">
                                    @csrf
                                </form>	
                            </div>
                            </li>
                            <li class="nav-item">
                            <a href="#" class="nav-link d-inline-block mt-2">
                                <img src="/images/icon-cart-empty.svg" alt="" />
                            </a>
                            </li>
                        </ul>
                        <div class="d-flex align-items-center flex-nowrap pt-xl-0">
                            <ul class="navbar-nav d-block d-lg-none">
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        Hi, {{ Auth::user()->fullname }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link d-inline-block">
                                        Settings
                                    </a>
                                </li>
                            </ul>
                        </div>   
                    @endauth
                   

                    @guest
                        <div class="d-flex align-items-center flex-nowrap pt-xl-0">
                            <a href="/login" class="btn btn-primary btn-primary-outline-0 rounded-pill py-3 px-4 ms-4">Login</a>
                        </div>
                        <div class="d-flex align-items-center flex-nowrap pt-xl-0">
                            <a href="/register" class="btn btn-primary btn-primary-outline-0 rounded-pill py-3 px-4 ms-4">Register</a>
                        </div>
                    @endguest
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Navbar End -->
