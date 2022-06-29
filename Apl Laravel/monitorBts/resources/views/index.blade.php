    @extends('layouts.main')
    <!--Header Akhir-->

    <!--Main Awal-->
    @section('container')
    {{-- <main> --}}
        <div class="banner d-flex justify-content-between ">
            <div class="banner_1 align-self-center">
                <h1>One app<br>that connects the world</h1>
                <br>
                <p>“We are all now connected by the Internet, like neurons in a giant brain.”<br>— Stephen Hawking</p>
                <br><br>
                <a href="#about">TELL ME MORE</a>
            </div>
            <div class="banner_2 align-self-center">
                <img style="width: 450px;" src="image/homebanner.png" alt>
            </div>
        </div>

        <br>

        <div class="heading">
            <h1><span>Selamat Datang di<br>Diskominfo BTS Surakarta</span></h1>
        </div>
        <div class="container_content content1 d-flex align-items-center" id="about">
            <div class="c1_logo">
                <img src="image/BTS logo2.png" style="width: 350px;" alt="logo">
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
            <div class="box mx-1">
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
            <div class="box mx-1">
                <div class="box_content">
                    <h5>Misi<br>#1</h5>
                    <div class="overlay">
                        <p>
                            Membangun dan memajukan infrastruktur Telekomunikasi Indonesia
                        </p>
                    </div>
                </div>
            </div>
            <div class="box mx-1">
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
            <div class="box mx-1">
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
        <div class="container_content content3 d-flex flex-wrap" id="what">
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
            </div>
            <div class="whatisbts2" style="background-image:url('image/indexinfografis.png') ; background-position: center;background-repeat:no-repeat">
                {{-- <img src="" alt="infografis"> --}}
            </div>
        </div>
        <br>
        <div class="heading">
            <h1><span>Alamat Kami</span></h1>
        </div>
        <div class="container_content content1" id="about">
            <div class="alamat rounded-5">
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
                            border-radius: 10px;
                        }
                    </style>
                </div>
            </div>
        </div>


        <br>

        <div class="break"></div>
    @endsection
    {{-- </main> --}}
    <!--Main Akhir-->
