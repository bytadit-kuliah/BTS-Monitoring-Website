<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diskominfo BTS Surakarta - About</title>
    <link rel="icon" type="image/x-icon" href="image/BTS logo.png">
    <link rel="stylesheet" href="css/index.css">
    <style>
        .alamat {
            align-items: center;
            height: 400px;
            line-height: 400px;
            text-align: center;
            background-color: #52784F;
            color: #fff;
        }

        .alamat span {
            font-family: 'Montserrat';
            font-size: 1.5rem;
            display: inline-block;
            vertical-align: middle;
            line-height: normal;
        }
    </style>
</head>

<body>
    <!--Header Awal-->
    <header>
        <div id="brand"><a href="#">
                <img src="image/BTS logo.png" alt="logo"></a>
            <ul>
                <li><a href="/">Home</a></li>
                <li>
                    <div class="dropdown">
                        <a href="#" class="drop_btn" onclick="dropdownFunction()">
                            Information
                        </a>
                        <div class="drop_content" id="myDropdown">
                            <a href="/about">Diskominfo Surakarta</a>
                            <a href="/btslist">Data BTS Tower</a>
                            <!-- <a href="btsmonitor.html">Data Monitoring</a> -->
                        </div>
                    </div>
                </li>
            </ul>
        </div>

            @auth
            <nav>
                <ul>
                    {{-- <li><p>Welcome {{ auth()->user()->username }}</p></li> --}}
                    <li id="dashboard" class="dashboard">
                        <button class="dashboard dropdown-item"><a href="/{{ auth()->user()->role }}">My Dashboard</a></button>
                    <li id="logout">
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item">LogOut</button>
                        </form>
                    </li>
                    {{-- <li id="login"><a href="/login">Log In</a></li> --}}
                    <li id="contact"><a href="/contact">Contact Us</a></li>
                </ul>
            </nav>
            @else
            <nav>
                <ul>
                    <li id="contact"><a href="/contact">Contact Us</a></li>
                    <li id="login"><a href="/login">Log In</a></li>
                </ul>
            </nav>
            @endauth

    </header>
    <!--Header Akhir-->

    <!--Main Awal-->
    <main>
        <div class="heading">
            <h1><span>Tentang Kami</span></h1>
        </div>
        <div class="container_content content1" id="about">
            <div class="c1_logo">
                <img src="image/BTS logo2.png" style="width: 400px;" alt="logo">
            </div>
            <div class="c1_about1">
                <p>
                    Penyediaan Base Transceiver Station (BTS) merupakan salah satu program Universal Service
                    Obligation (USO) yang dilaksanakan oleh Dinas Kementerian Komunikasi dan Informatika Kota
                    Surakarta melalui Balai Penyedia dan Pengelola Pembiayaan Telekomunikasi dan Informatika
                    (BP3TI). Program ini, yang menjangkau wilayah 3T (Terdepan, Terluar, Tertinggal), merupakan
                    salah satu strategi Kementerian Komunikasi dan Informatika/BP3TI dalam mengurangi kesenjangan
                    telekomunikasi. Pelaksanaan strategi tersebut adalah penyediaan layanan seluler telefoni dasar di
                    daerah yang belum mendapatkan sinyal selular.
                </p>
            </div>
        </div>

        <br>

        <div class="heading">
            <h1><span>Alamat Kami</span></h1>
        </div>
        <div class="container_content content1" id="about">
            <div class="alamat">
                <span>
                    Jl. Jendral Sudirman, Kedung Lumbu,
                    <br>
                    Kecamatan Ps. Kliwon, Kota Surakarta,
                    <br>
                    Jawa Tengah. 57133.
                </span>
            </div>
            <div class="mapouter">
                <div class="gmap_canvas"><iframe width="100%" height="400" id="gmap_canvas"
                        src="https://maps.google.com/maps?q=diskominfo%20surakarta&t=&z=13&ie=UTF8&iwloc=&output=embed"
                        frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a
                        href="https://123movies-to.org"></a><br>
                    <style>
                        .mapouter {
                            position: relative;
                            text-align: right;
                            height: 400px;
                            width: 100%;
                        }
                    </style><a href="https://www.embedgooglemap.net">create custom map free</a>
                    <style>
                        .gmap_canvas {
                            overflow: hidden;
                            background: none !important;
                            height: 400px;
                            width: 100%;
                        }
                    </style>
                </div>
            </div>
        </div>


        <br>

        <div class="break"></div>
    </main>
    <!--Main Akhir-->

    <!--Awal Footer-->
    <footer>
        <div class="footer_content">Copyright &copy; Diskominfo BTS Surakarta 2022 </div>
        <div class="footer_content">
            <a href="https://www.instagram.com"><img src="image/sosmed1.png" alt="ig"></a>
            <a href="https://www.twitter.com"><img src="image/sosmed2.png" alt="tw"></a>
            <a href="https://www.facebook.com"><img src="image/sosmed3.png" alt="fb"></a>
            <a href="https://www.youtube.com"><img src="image/sosmed4.png" alt="yt"></a>
            <a href="https://www.linkedin.com"><img src="image/sosmed5.png" alt="in"></a>
            <a href="https://www.whatsapp.com"><img src="image/sosmed6.png" alt="wa"></a>
        </div>
        <div class="footer_content" id="fc">
            <a href="#">Privacy Policy</a>
            <a href="#">Terms of Use</a>
        </div>
    </footer>
    <!--Akhir Footer-->

    <script>
        // Dropdown
        function dropdownFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }
        window.onclick = function (e) {
            if (!e.target.matches('.drop_btn')) {
                var myDropdown = document.getElementById("myDropdown");
                if (myDropdown.classList.contains('show')) {
                    myDropdown.classList.remove('show');
                }
            }
        }
    </script>
</body>

</html>
