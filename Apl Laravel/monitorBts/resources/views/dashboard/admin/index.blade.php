@extends('dashboard.layouts.main')


<!-- Main Awal -->
@section('container')
    <h1 class="mt-4 border-3 rounded-3 border-bottom">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard Admin</li>
    </ol>

    <div class="row">
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
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-pie me-1"></i>
                    Plotting Jawaban Survey
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
    </div>
</div>
<script>

    const getChartData = () => {
        var label = JSON.parse("{{ json_encode($label) }}");
        var count = JSON.parse("{{ json_encode($count) }}");
        console.log(label, count);
        // Pie Chart
        const ctx = document.getElementById('myPieChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: label,
                datasets: [{
                    label: 'My First Dataset',
                    data: count,
                    backgroundColor: getRandomColor(),
                    hoverOffset: 4
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // ...
    }
    document.getElementById('copyright').innerHTML = new Date().getFullYear();


    function getRandomColor() {
    var colors = [];
    for (var i = 0; i < Object.keys(JSON.parse("{{ json_encode($count) }}")).length; i++) {
        var letters = '0123456789ABCDEF'.split('');
        var color = '#';
        for (var x = 0; x < 6; x++) {
        color += letters[Math.floor(Math.random() * 16)];
        }
        colors.push(color);
    }
    return colors;
    }

    $(document).ready(function() {
        getChartData();
    });
</script>
</footer>
@endsection
<!-- Footer Akhir -->
