<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="#">Kore Wa Mendo Desu</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <!-- <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div> -->
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('user.manage') }}">Account</a></li>
                        <li><a class="dropdown-item" href="{{ route('user.library') }}">My Library</a></li>
                        <li><a class="dropdown-item" href="{{ route('user.publish') }}">Post Manga</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{ route('user.dashboard') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>

                            <div class="sb-sidenav-menu-heading">Categories</div>
                            <a class="nav-link" href="{{ route('user.action') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Action
                            </a>
                            <a class="nav-link" href="{{ route('user.horror') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Horror
                            </a>
                            <a class="nav-link" href="{{ route('user.isekai') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Isekai
                            </a>
                            <a class="nav-link" href="{{ route('user.romcom') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Romantic Comedy
                            </a>
                            <a class="nav-link" href="{{ route('user.other') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Other
                            </a>
                            <a class="nav-link" href="{{ route('upcoming') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Upcoming Novels
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        @if(auth()->check())
                            <p>Welcome, {{ auth()->user()->name }}</p>
                            
                        @else
                            <p>Not logged in</p>
                        @endif
                    </div>
                </nav>
            </div>
        </div>

