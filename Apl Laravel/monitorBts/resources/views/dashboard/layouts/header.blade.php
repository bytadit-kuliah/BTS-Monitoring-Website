<header>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-bts-1">
        <a class="navbar-brand ps-1 d-flex bg-bts-3" href="#" style="border-top-right-radius: 20px; justify-content: center; height:3.5rem">
            @if($configs->sidebar_logo == null)
                <img src="/./image/BTS logo3.png" id="logo" alt="logo" style="margin-left: -25px; width: 100px;">
                @else
                <img src="{{ asset('storage/' . $configs->sidebar_logo) }}" id="logo" alt="logo" style="margin-left: -25px; width: 100px;">
            @endif
        </a>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                 aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="/dashboard/users/{{ auth()->user()->id }}/edit">Edit Profil</a></li>
                    <li><a class="dropdown-item" href="/">Home</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li id="logout">
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item">Log Out</button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</header>
<!-- Header Akhir -->
