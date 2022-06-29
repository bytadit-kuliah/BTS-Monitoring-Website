    <!-- Sidebar Awal -->
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark bg-bts-3" id="sidenavAccordion" style="background-color: #52784F; border-bottom-right-radius: 20px;">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">
                        <div class="row sb-nav-link-icon align-items-center">
                                @if(auth()->user()->photo)
                                    <div class='col-md-2 offset-md-1' style="width:50px;height:50px;border-radius:50%;background-image:url('{{ asset('storage/' . auth()->user()->photo) }}'); background-size: cover;"></div>
                                @else
                                    <div class='col-md-2 offset-md-1' style="width:50px;height:50px;border-radius:50%;background-image:url('/./image/pp.png'); background-size: cover;"></div>
                                @endif
                            <div class="flex flex-column col-md-8 ">
                                <small class="font-weight-normal" style="color:#F4D2EB; font-weight:lighter">Selamat Datang</small>
                                <p class='text-break'>{{ auth()->user()->firstName }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="sb-sidenav-menu-heading">General</div>
                    <a class="nav-link" href="/dashboard">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Master Data</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                        data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Data Akun
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    @can('admin')
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="/dashboard/users/{{ auth()->user()->id }}/edit">Edit Profil</a>
                            <a class="nav-link" href="/dashboard/configs/1/edit">Config</a>
                            <a class="nav-link" href="/dashboard/users">Data User</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                        aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Data BTS
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="/dashboard/btslists">Info BTS</a>
                            <a class="nav-link" href="/dashboard/providers">Data Provider BTS</a>
                            <a class="nav-link" href="/dashboard/surveys">Data Survey</a>
                        </nav>
                    </div>
                    @endcan
                @can('surveyor')
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="/dashboard/users/{{ auth()->user()->id }}/edit">Edit Profile</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                    aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Activities
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="/dashboard/btslists">Data BTS</a>
                        <a class="nav-link" href="/dashboard/mysurveys">Isi Survey</a>
                        <a class="nav-link" href="/dashboard/monitorings">Data Monitoring</a>
                    </nav>
                </div>
                @endcan
                </div>
            </div>
    </nav>
</div>
