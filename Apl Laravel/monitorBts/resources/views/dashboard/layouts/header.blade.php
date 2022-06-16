<header>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-bts-1">
        <a class="navbar-brand ps-3 d-flex bg-bts-3" href="#" style="padding-bottom:18px; border-top-right-radius: 40px; justify-content: center;">
            <img src="/./image/BTS logo3.png" id="logo" alt="logo" style="margin-left: -25px; margin-top:18px; width: 100px;">
        </a>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">4</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li>
                        <a href="/admin/pesan" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                    </li>
                    <!-- <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </li> -->
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                 aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="/admin/edit-profile">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li><a class="dropdown-item" href="/">Home</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li id="logout">
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item">LogOut</button>
                        </form>
                    </li>
                    {{-- <li><a class="dropdown-item" href="#!">Logout</a></li> --}}
                </ul>
            </li>
        </ul>
    </nav>
</header>
<!-- Header Akhir -->
