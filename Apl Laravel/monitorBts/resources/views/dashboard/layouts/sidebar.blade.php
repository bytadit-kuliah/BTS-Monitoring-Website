    <!-- Sidebar Awal -->
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark bg-bts-3" id="sidenavAccordion" style="background-color: #52784F; border-bottom-right-radius: 20px;">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">
                        <div class="d-flex sb-nav-link-icon">
                            @if(auth()->user()->photo)
                                <img src="{{ asset('storage/' . auth()->user()->photo) }}" style="margin-right:10px;vertical-align:middle;width:50px;height:50px;border-radius:50%;">
                            @else
                                <img src="/./image/pp.png" style="width:50px; margin-right: 10px;">
                            @endif
                            <div class="d-flex flex-column">
                                <small class="font-weight-normal" style="color:#F4D2EB; font-weight:lighter">Selamat Datang</small>
                                <p >{{ auth()->user()->firstName }}</p>
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
                            <a class="nav-link" href="/dashboard/edit-config">Config</a>
                            <a class="nav-link" href="/dashboard/users">Data Surveyor</a>
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
                            <a class="nav-link" href="/dashboard/owners">Data Owner BTS</a>
                            {{-- <a class="nav-link" href="/dashboard/edit-wilayah">Edit Wilayah BTS</a> --}}
                            <a class="nav-link" href="/dashboard/list-survey">Buat Survey</a>
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
                    Data BTS
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="/dashboard/btslists">Data BTS</a>
                        <a class="nav-link" href="/dashboard/my-surveys">Isi Survey</a>
                        <a class="nav-link" href="/dashboard/my-monitoring">Data Monitoring</a>
                    </nav>
                </div>
                @endcan
                </div>
            </div>
    </nav>
</div>
