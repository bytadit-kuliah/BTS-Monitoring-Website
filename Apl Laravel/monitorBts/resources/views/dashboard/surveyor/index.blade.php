@extends('dashboard.layouts.main')

<!-- Main Awal -->
@section('container')
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard Surveyor</li>
    </ol>
    <div class="row">
        <div class="col-xl-6 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <div>BTS Termonitor</div>
                    <h3 class="text-white">4</h3>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="surveyList.html">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">
                    <div>Survey Belum Terisi</div>
                    <h3 class="text-white">3</h3>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="surveyList.html">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-bts-3 text-white mb-4">
                <div class="card-body">
                    <div>Survey Terisi</div>
                    <h3 class="text-white">2</h3>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="surveyList.html">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
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
</div>
@endsection
<!-- Main Akhir -->

<!-- Footer Awal -->
@section('footer')
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
@endsection
<!-- Footer Akhir -->
