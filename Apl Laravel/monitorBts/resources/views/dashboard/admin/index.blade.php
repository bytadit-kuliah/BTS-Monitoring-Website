@extends('dashboard.layouts.main')


<!-- Main Awal -->
@section('container')
    <h1 class="mt-4 border-3 rounded-3 border-bottom">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard Admin</li>
    </ol>
    {{-- <div class="row">
        <div class="col-xl-12 col-md-6">
            <div class="card bg-bts-3 text-white mb-4">
                <div class="card-body">
                    <div>Jumlah Pesan Baru</div>
                    <h3 class="text-white">4</h3>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="/admin/pesan">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="row">
        {{-- <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <div>Jumlah Pengunjung</div>
                    <h3 class="text-white">28</h3>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div> --}}
        <div class="col-xl-4 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                    <div>Jumlah Survey</div>
                    <h3 class="text-white">{{ $surveys->count() }}</h3>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="/dashboard/surveys">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card bg-dark text-white mb-4">
                <div class="card-body">
                    <div>Jumlah BTS</div>
                    <h3 class="text-white">{{ $btslists->count() }}</h3>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="/dashboard/btslists">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">
                    <div>Jumlah Surveyor</div>
                    <h3 class="text-white">{{ $surveyors->count() }}</h3>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="/dashboard/users">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <!-- <div class="col-xl-2 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Edit Survey</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="editSurvey.html">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div> -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-pie me-1"></i>
                    Plotting Jawaban Survey
                    <!-- <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                        <a class="nav-link active" href="#">Active</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li>
                    </ul> -->
                </div>
                <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area me-1"></i>
                    Alamat
                </div>
                <div class="card-body">
                    <div class="mapouter">
                        <div class="gmap_canvas"><iframe width="100%" height="100%" id="gmap_canvas"
                                src="https://maps.google.com/maps?q=diskominfo%20surakarta&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                frameborder="0" scrolling="no" marginheight="0"
                                marginwidth="0"></iframe><a href="https://123movies-to.org"></a><br>
                            <style>
                                .mapouter {
                                    position: relative;
                                    text-align: right;
                                    height: 15rem;
                                    width: 100%;
                                }

                                .gmap_canvas {
                                    overflow: hidden;
                                    background: none !important;
                                    height: 15rem;
                                    width: 100%;
                                }
                            </style>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    Date & Time
                </div>
                <div class="card-body">
                    <div id="clock" style="height: 15rem; text-align: center;">
                        <h1 id="date-time"></h1>
                        <div id="clockContainer">
                            <div id="hour"></div>
                            <div id="minute"></div>
                            <div id="second"></div>
                        </div>
                    </div>
                    <style>
                        #clockContainer {
                            position: relative;
                            margin: auto;
                            height: 10rem;
                            width: 10rem;
                            background: url(image/clock.png) no-repeat;
                            background-size: 100%;
                        }

                        #hour,
                        #minute,
                        #second {
                            position: absolute;
                            background: black;
                            border-radius: 10px;
                            transform-origin: bottom;
                        }

                        #hour {
                            width: 1.8%;
                            height: 25%;
                            top: 25%;
                            left: 48.85%;
                            opacity: 0.8;
                        }

                        #minute {
                            width: 1.6%;
                            height: 30%;
                            top: 19%;
                            left: 48.9%;
                            opacity: 0.8;
                        }

                        #second {
                            width: 1%;
                            height: 40%;
                            top: 9%;
                            left: 49.25%;
                            opacity: 0.8;
                        }
                    </style>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- Main Akhir -->

<!-- Footer Awal -->
@section('footer')
<footer class="py-4 bg-light mt-auto">
<div class="container-fluid px-4">
    <div class="d-flex align-items-center justify-content-between small">
        <div class="text-muted">Copyright &copy; {{ $configs->company }} <span id="copyright"></span> </div>
        {{-- <div>
            <a href="#">Privacy Policy</a>
            &middot;
            <a href="#">Terms &amp; Conditions</a>
        </div> --}}
    </div>
</div>
<script>
    document.getElementById('copyright').innerHTML = new Date().getFullYear();
</script>
</footer>
@endsection
<!-- Footer Akhir -->
