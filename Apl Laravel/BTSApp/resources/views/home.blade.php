<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diskominfo Surakarta - BTS</title>
    <link rel="icon" type="image/x-icon" href="image/BTS logo.png">
    <link rel="stylesheet" href="css/index.css">
    {{-- <link rel="stylesheet" href="css/dbAdmin.css"> --}}
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
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
        <div class="banner">
            <div class="banner_1">
                <h1>One app<br>that connects the world</h1>
                <br>
                <p>“We are all now connected by the Internet, like neurons in a giant brain.”<br>— Stephen Hawking</p>
                <br><br>
                <a href="#about">TELL ME MORE</a>
            </div>
            <div class="banner_2">
                <img style="width: 600px;" src="image/homebanner.png" alt>
            </div>
        </div>

        <br>

        <div class="heading">
            <h1><span>Selamat Datang di<br>Diskominfo BTS Surakarta</span></h1>
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
            <div class="c1_about2">
                <p>
                    Tujuan Penyediaan Base Transceiver Station (BTS) ini adalah langkah pemenuhan kewajiban Negara
                    terhadap masyarakat dalam memenuhi kebutuhan masyarakat terhadap akses telekomunikasi dan
                    informatika, memperkuat persatuan dan kesatuan bangsa, serta memperkuat ketahanan nasional.
                    Hal ini sejalan dengan Program Nawacita yang telah dicanangkan oleh Presiden RI, terutama pada
                    butir ke-3, yaitu membangun Indonesia dari pinggiran dengan memperkuat daerah-daerah dan desa
                    dalam kerangka Negara Kesatuan Republik Indonesia. Website ini khusus untuk mengatur,
                    mengelola dan mengawasi BTS di Kota Surakarta.
                </p>
            </div>
        </div>

        <br>

        <div class="heading">
            <h1><span>Visi & Misi</span></h1>
        </div>
        <div class="container_content content2" id="visi">
            <div class="box">
                <div class="box_content">
                    <h5>Visi</h5>
                    <div class="overlay">
                        <p>
                            Menjadi perusahaan Telekomunikasi yang terkemuka di bidang
                            Pemasangan, Pengujian, Kelayakan dan Pekerjaan sarana penunjang
                            Base Transceiver Station.
                        </p>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="box_content">
                    <h5>Misi<br>#1</h5>
                    <div class="overlay">
                        <p>
                            Membangun dan memajukan infrastruktur Telekomunikasi di Indonesia
                        </p>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="box_content">
                    <h5>Misi<br>#2</h5>
                    <div class="overlay">
                        <p>
                            Mengembangkan bidang komunikasi di Indonesia dan menciptakan kemudahan komunikasi antar
                            negara
                        </p>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="box_content">
                    <h5>Misi<br>#3</h5>
                    <div class="overlay">
                        <p>
                            Mendukung dan menjalin kemitraan dengan Tower Provider
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <div class="heading">
            <h1><span>Apa itu BTS?</span></h1>
        </div>
        <div class="container_content content3" id="what">
            <div class="whatisbts1">
                <p>
                    BTS (Base Transceiver Station) atau disebut juga stasiun pemancar adalah sebuah infrastruktur
                    telekomunikasi yang memfasilitasi komunikasi nirkabel antara peranti komunikasi dan jaringan
                    operator. Tugas utama BTS adalah mengirimkan dan menerima sinyal radio ke perangkat komunikasi
                    seperti telepon mah, telepon seluler dan sejenis gadget lainnya.BTS kadang juga disebut sebagai Base
                    Station (BS) dan Radio Base Station (RBS). BTS adalah salah satu bentuk infrastruktur telekomunikasi
                    yang berperan penting dalam mewujudkan komunikasi nirkabel antara jaringan operator dengan perangkat
                    komunikasi.
                </p>
                <br>
                <p>
                    Tugas utama BTS adalah mengirimkan dan menerima sinyal radio ke perangkat komunikasi
                    seperti telepon rumah, telepon seluler dan sejenis gadget lainnya. Kemudian sinyal radio tersebut
                    akan diubah menjadi sinyal digital yang selanjutnya dikirim ke terminal lainnya menjadi sebuah pesan
                    atau data. Dari hal tersebut kita dapat mengetahui bahwa BTS juga dapat berfungsi untuk mengontrol
                    arus transaksi yang terjadi di setiap provider ketika terjadi proses pengisian ulang pulsa kepada
                    konsumen. Dengan begitu maka ketika ada konsumen yang melakukan pengisian pulsa diluar BTS maka
                    secara otomatis akan langsung terdeteksi oleh BTS itu sendiri.
                </p>
                <br>
                <p>
                    Salah satu komponen dari perangkat BTS adalah Tower BTS. Tower itu sendiri merupakan suatu menara
                    yang dibuat dari besi atau pipa. Dalam pembuatanya tower BTS bentuknya bisa bervariasi, ada yang
                    memiliki kaki segi empat, kaki segitiga, bahkan ada yang hanya berupa pipa panjang saja.
                    Umumnya tower BTS memiliki panjang antara 40 hingga 75 meter. Tiap daerah memiliki panjang tower BTS
                    yang berbeda-beda disesuaikan dengan kondisi geografis serta luas jangkauan jaringan yang
                    ditargetkan.
                </p>
            </div>
            <div class="whatisbts2">
                <img src="image/indexinfografis.png" alt="infografis">
            </div>
        </div>

        <br>

        <div class="heading">
            <h1><span>Galeri</span></h1>
        </div>
        <div class="container_content content4" id="galeri">
            <table width="100%" cellpadding="10">
                <tr>
                    <td width="25%"><img class="galeri" src="image/indexgaleri1.jpg" alt="galeri1" height="200px"></td>
                    <td width="25%"><img class="galeri" src="image/indexgaleri2.jpg" alt="galeri2" height="200px"></td>
                    <td width="25%"><img class="galeri" src="image/indexgaleri3.jpg" alt="galeri3" height="200px"></td>
                    <td width="25%"><img class="galeri" src="image/indexgaleri4.jpg" alt="galeri4" height="200px"></td>
                </tr>
                <tr>
                    <td><br></td>
                </tr>
                <tr>
                    <td><img class="galeri" src="image/indexgaleri5.jpg" alt="galeri5" height="200px"></td>
                    <td><img class="galeri" src="image/indexgaleri6.jpg" alt="galeri6" height="200px"></td>
                    <td><img class="galeri" src="image/indexgaleri7.jpg" alt="galeri7" height="200px"></td>
                    <td><img class="galeri" src="image/indexgaleri8.jpg" alt="galeri8" height="200px"></td>
                </tr>
            </table>
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
