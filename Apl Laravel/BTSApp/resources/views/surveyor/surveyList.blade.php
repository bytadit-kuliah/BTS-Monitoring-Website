<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey List - BTS Surveyor</title>
    <link rel="icon" type="image/x-icon" href="image/BTS logo.png">
    <link rel="stylesheet" href="css/dbAdmin.css">
    <link rel="stylesheet" href="css/surveyList.css">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Header Awal -->
    <header>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-bts-1">
            <a class="navbar-brand ps-3 d-flex bg-bts-3" href="#" style="padding-bottom:18px; border-top-right-radius: 40px; justify-content: center;">
                <img src="image/BTS logo3.png" id="logo" alt="logo" style="margin-left: -25px; margin-top:18px; width: 100px;">
            </a>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
    <!-- Header Akhir -->


    <div id="layoutSidenav">
        <!-- Sidebar Awal -->
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion" style="background-color: #52784F; border-bottom-right-radius: 20px;">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">
                            <div class="d-flex sb-nav-link-icon">
                                <img src="./image/pp.png" style="width:50px; margin-right: 10px;">
                                <div class="d-flex flex-column">
                                    <small class="font-weight-normal" style="color:#F4D2EB; font-weight:lighter">Welcome</small>
                                    <p >{{ auth()->user()->name }}</p>

                                </div>
                            </div>
                        </div>

                        <div class="sb-sidenav-menu-heading">General</div>
                        <a class="nav-link" href="dashboardSurveyor.html">
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
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="editProfileSurveyor.html">Edit Profil</a>
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
                                <a class="nav-link" href="listBTSInfo.html">BTS info</a>
                                <a class="nav-link" href="surveyList.html">Survey</a>
                                <a class="nav-link" href="monitoringSurveyor.html">Monitoring</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar Akhir -->

        <div id="layoutSidenav_content">
            <!-- Main Awal -->
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">List Survey</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Survey aktif:</li>
                    </ol>
                    <div class="d-flex flex-wrap survey-cards" style="justify-content:space-between;">
                        <div class="card text-white bg-danger border-3" style="max-width: 18rem;">
                              <h3 class="card-header">ID Survey</h3>
                              <div class="card-body">
                              <h6 class="card-title">topik survey</h6>
                              <p class="card-text">Deskripsi survey deskripsi survey deskripsi survey deskripsi survey deskripsi survey deskripsi survey deskripsi survey.</p>
                              <div class="d-flex" style="justify-content: flex-end;">
                                  <a class="text-black-50" href="inputSurvey.html" class="card-link">Isi Survey</a>
                                  <!-- <a href="#" class="card-link">Edit Jawaban</a> -->
                              </div>
                            </div>
                        </div>
                        <div class="card text-white bg-danger border-3" style="max-width: 18rem;">
                              <h3 class="card-header">ID Survey</h3>
                              <div class="card-body">
                              <h6 class="card-title">topik survey</h6>
                              <p class="card-text">Deskripsi survey deskripsi survey deskripsi survey deskripsi survey deskripsi survey deskripsi survey deskripsi survey.</p>
                              <div class="d-flex" style="justify-content: flex-end;">
                                  <a class="text-black-50" href="inputSurvey.html" class="card-link">Isi Survey</a>
                                  <!-- <a href="#" class="card-link">Edit Jawaban</a> -->
                              </div>
                            </div>
                        </div>
                        <div class="card text-white bg-danger border-3" style="max-width: 18rem;">
                              <h3 class="card-header">ID Survey</h3>
                              <div class="card-body">
                              <h6 class="card-title">topik survey</h6>
                              <p class="card-text">Deskripsi survey deskripsi survey deskripsi survey deskripsi survey deskripsi survey deskripsi survey deskripsi survey.</p>
                              <div class="d-flex" style="justify-content: flex-end;">
                                  <a class="text-black-50" href="inputSurvey.html" class="card-link">Isi Survey</a>
                                  <!-- <a href="#" class="card-link">Edit Jawaban</a> -->
                              </div>
                            </div>
                        </div>
                        <div class="card text-white bg-success border-3" style="max-width: 18rem;">
                              <h3 class="card-header">ID Survey</h3>
                              <div class="card-body">
                              <h6 class="card-title">topik survey</h6>
                              <p class="card-text">Deskripsi survey deskripsi survey deskripsi survey deskripsi survey deskripsi survey deskripsi survey deskripsi survey.</p>
                              <div class="d-flex" style="justify-content: flex-end;">
                                  <a class="text-black-50" href="inputEditSurvey.html" class="card-link">Edit Jawaban</a>
                                  <!-- <a href="#" class="card-link">Edit Jawaban</a> -->
                              </div>
                            </div>
                        </div>
                        <div class="card text-white bg-success border-3" style="max-width: 18rem;">
                              <h3 class="card-header">ID Survey</h3>
                              <div class="card-body">
                              <h6 class="card-title">topik survey</h6>
                              <p class="card-text">Deskripsi survey deskripsi survey deskripsi survey deskripsi survey deskripsi survey deskripsi survey deskripsi survey.</p>
                              <div class="d-flex" style="justify-content: flex-end;">
                                  <a class="text-black-50" href="inputEditSurvey.html" class="card-link">Edit Jawaban</a>
                                  <!-- <a href="#" class="card-link">Edit Jawaban</a> -->
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <!-- Main Akhir -->

            <!-- Footer Awal -->
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Diskominfo BTS Surakarta 2022</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- Footer Awal -->
        </div>
    </div>
</body>

</html>
