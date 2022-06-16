# BTS-Monitoring-Website
[WEB PROGRAMMING PROJECT]  : A Base Transceiver Station Website based on Laravel 8, Made By Group 3

### Penjelasan Umum
1. Ini adalah website tipe dashboard yang menampung hasil monitoring BTS di Kota ABC
2. Website terhubung/memiliki laman admin, untuk memonitoring Data BTS, dan laman Surveyor untuk memberikan data tentang BTS di Kota ABC.
3. Website dibuat dengan Laravel 8 dan DataBase MySQL

##### Layout Laman Admin
![Admin Template](https://yukcoding.id/wp-content/uploads/2017/07/Download-Koleksi-Template-Bootstrap-Responsive-Gratis.jpg)
Layout Admin, merupakan tampilan sistem informasi yang memberikan privileges bagi admin untuk mengelola website (Privileges Admin akan dijelaskan lebih lanjut)
##### Layout Laman Surveyor
![Surveyor Template](https://blogger.googleusercontent.com/img/a/AVvXsEjg9v7TPpArmaiP0HO3NQT5u968StLDSwCfXlNH35jLGnjEmqTEFL-s93S-JzqN0rG9XXgjjC9XnEcovxRoe-OS86uE75rS3fpXd9yP3cm3eC4dNBGlag_MJTnlnwr6AMcJmyvWFo0vaT67-E0HGZFjcYAJHLtGeV8plP_gTVSoU9MyhI34wBXtShB_=s1920)
merupakan tampilan sistem informasi yang diperuntukkan untuk surveyor (peran surveyor akan dijelaskan lebih lanjut), tampilan boleh sama/mirip spt tampilan layout laman admin


3. Database menggunakan mySQL, penjelasan akan diberikan lebih lanjut
4. ....soon akan diupdate lagi

### System Request

#### Laman Admin
1. Kemampuan melihat plotting/grafik berdasarkan hasil survey
2. Kemampuan untuk menambah/menghapus daftar surveyor
3. Kemampuan untuk menambah, mengedit, menghapus informasi BTS


### Penjelasan Database dan Kemungkinan Fitur

#### Tabel Config Aplikasi
(ini berdasarkan pemahaman adit)
Tabel Config ini adl dtabel yang row nya berisi masing" konfigurasi pada aplikasi, seperti logo (nnti akan upload gbr, klo di db pakai path gbr, menurutku kita jgn pakai blob, spy gk lemot), alamat, link sosmed, dll. 
nnti tiap config ini akan ada id nya, jdi config alamat ada idnya sendiri, config logo sendiri, config sosmed, itu masing" punya id sendiri", 
jdi klo liat di dbnya (updated sql), bakal ada: 
1. id_config => id masing" confignya
2. nama_config => diisi ini config buat apa, misal logo, atau alamat
3. value_config => diisi nilainya, misal klo logo ya path gambarnya, klo alamat ya alamat kominfonya dimana, dst
4. waktu buat dn waktu update, ini bisa pake current time
jdi yg urusin config ini admin, nnti bakal ada tab config di laman admin.
dan isi dri value" config ini bisa digunain di laman manapun, visitor, surveyor, dll, 
misal digunain buat logo kominfo di laman visitor, ya brti tinggal fetch(ambil) data path logo dri tabel config ini.
model klo bentukannya form ya kyk gini [config insight](https://www.youtube.com/watch?v=5E5v9HvYsuc), tpi nnti kita formnya buat masing" config aja, klo itu kan berurutan

#### Laman Admin
1. Tambah, Hapus Surveyor
2. Plot Grafik Hasil Survey, dari laman surveyor, biasanya ada di home laman admin, yg didampingi report" lainnya, nnti lia aja contohnya
3. Edit Profil, termasuk upload foto dan edit password
4. Untuk sementara admin tidak bisa menghapus admin lain
5. Kuesioner, ada list kuesioner yg udah dibuat, tiap kuesioner bisa dihapus atau diedit isinya, bisa juga bikin kuesioner baru, referensinya bisa cari di web survey kyk nusaresearch, swagbucks, dll
6. Kuesioner berisi pertanyaan dan pilihan jawaban, yg masing" bisa diedit isinya
7. Bakal ada editing info
8. Info BTS, ada list BTS, admin bisa nambah list, bisa ngedit info BTS, bisa juga ngedit infonya
9. Info Pemilik BTS, admin bisa ngedit, nambah, ngehapus
10. Wilayah, admin bisa ngedit, nambah, ngehapus list" wilayah yg ada BTSnya
11. (Optional) Pada Info BTS, form yg isinya berelasi dengan database, bisa dibuat dropdown yang langsung berisi list dri database yg dituju, misal form untuk pemilik, mk bisa berisi dropdown nama" pemilik BTS, jdi tidak perlu ngetik, 
    (mungkin untuk ini, akan ada fitur dimana, jika isian berelasi dgn db (berupa dropdown), dan data yg diketikkan belum ada di db, maka otomatis datanya akan ditambahkan sbg data baru ke db, misal mau ngisi pemilik adl pertamina, tpi di dropdown tidak ada, mk admin bisa ngetik pertamina di isian pemilik, dan pertamina akan dijadikan data baru di tabel pemilik, (akan dibuatkan idnya juga)
12. Edit config
13. fitur logout, jika logout, mk kembali ke form login di laman visitor

#### Laman Surveyor
1. Di Home ada jml survey yg udah dikerjakan, , jml upcoming survey (yg belum dikerjakan), jml bts yg udah dimonitor, dsb, designnya kek gini:
   ![Gbr Count](https://usebootstrap.com/assets/webp/adminlte-v3.webp)
2. fitur edit profil, termasuk password
3. Informasi BTS, yg digenerate dari laman admin (tabel INFO_BTS)
4. Kuesioner, isinya ada survey baru yg belum dikerjain, ada list" riwayat pengisian survey/kuesioner (misal survey blabla", selesai pada bla"") nnti jawaban dri survey yg udah dikerjain itu bisa diedit lagi isinya sm surveyor, nnti bakal ada editing info
5. Monitoring, isinya list" riwayat monitoring yg udah dilakuin, termasuk berisi BTS yg dimonitoring yg merefer ke tabel info_bts

### Tools yang dibutuhkan
#### Front End
1. Code Editor (Bebas)
2. Browser
3. Figma (optional)
4. Git
5. Niat, semangat

#### Back End
1. IDE / Code Editor (Bebas)
2. MySQL Server
3. PHP 7.4
4. XAMPP versi terbaru (include PHP 8, MySQL, Apache)
5. [PHP Composer (needs PHP 7.4)](https://getcomposer.org/)
6. Browser
7. Git
8. Niat, waktu

### Catatan & Job Desc Untuk Developer
1. Untuk saat ini admin tidak bisa dibuat oleh siapapun (sudah pakem), tpi mungkin kedepan, admin baru bisa dibuat oleh admin lama (tpi yg jelas tidak bisa signup sendiri sbg admin)
2. Surveyor, ada fitur registrasi
3. Silakan pakai template, referensi, library, maupun contoh apapun bebas, yang terpenting bisa memudahkan, cepet selesai dan tetap ATM (jgn full jiplak)
4. Tetap komunikasi satu sama lain, via pc klo mau intens !!

#### Front End
1. Yg plot grafik ada yg pake library js btw
2. Pahami database, system request, dan kemungkinan fitur yang ada
3. Silakan Buat Design, HTML, CSS, JS untuk tampilan pada layout Visitor, Admin, dan Surveyor
4. Tampilan Layout Admin dan Surveyor bisa pakai design yang sama, namun kontennya tetap berbeda (menyesuaikan database, dan system request yang diperlukan)
5. Untuk design, demi kecepatan, boleh juga pakai template design laravel yang sudah tersedia banyak di internet secara gratis (sudah ada bbrp contoh di folder Referensi terutama utk yg admin), namun tetap buat perbedaan dan kontennya tetap menyesuaikan system request
6. Mockup Design boleh pakai figma atau apapun bebas, atau langsung ngoding jga boleh, penting jadi
7. Tetap koordinasi dengan backend, supaya tetap satu pemahaman
8. Desgin Form untuk kuis, nnti isi pertanyaan dan pilihan jawaban kuis (mungkin) bisa dipikir bareng"
9. Laman surveyor dan admin itu designnya boleh sama, yg beda adalah laman visitor yg lebih spt landing page. admin dan surveyor tidak perlu punya laman spt visitor, desgin laman mereka ya kyk template admin yg udh ada di folder template.

#### [UPDATE BARU, ISI DASHBOARD]
Isi dashboardnya ini ya ,
admin :
1. edit profile (sesuaiin database), didalamnya bakal ada edit password dan username(selama belum ada yg menggunakan)
2. surveyor, bisa liat list surveyor, dmn tiap listnya ada info profil surveyor, dan ada riwayat survey. nah di riwayat survey ini, dia adl tabel sendiri, nnti bikin aja pop up/ expand pas diklik, ky listbts, itu nnti isinya semua survey yg ada/telah dibikin oleh admin, beserta keterangan dri pengerjaan survey oleh surveyor itu (status), apakah survei ini telah dikerjakan atau belum. (liat aja dbnya).
Trus ada buat akun baru surveyor, yg diisi oleh admin pas bikin akun survyeor, cuma username,email, sm password, password boleh bebas(krn nnti bisa diganti oleh surveyor sendiri, yg penting tau password awalnya), tiap bikin akun, selain kasih input password kasih juga confirm password(buat validasi). Admin ga bisa ngedit info profil surveyor, tpi bisa ngehapus surveyor.
3. kuesioner (sekarang ganti namanya jadi survey), bikin survey,tiap survey punya kode, tpi gausah bikin sendiri( krn auto increment), tiap survey punya bbrp pertanyaan, tiap pertanyaan punya bbrp jawaban, nnti bisa edit survey (termasuk pertanyaan, dan pilihan jawaban), bisa juga hapus survey, nnti ada tgl dibuat kuesioner(auto generate), ada nama admin pembuat survey (lihat database),
4. Info_BTS(sekarang jadi BTS aja), buat info baru ttg bts (datanya apa aja liat di database), edit info, hapus info, nnti kasih gmaps sekalian jga boleh, nnti ada wktu"nya (autogenerate)
5. wilayah(ini skrg ganti jadi desa), klo parent wilayah jdi kecamatan, liat dbnya
6. edit config, ini ya liat aja dbnya, nnti ada nama config, sm value, sm tgl edit config
7. PEMILIK, sesuaikan db
8. Informasi Login User (Tabel USER_LOG), buat ngeliat siapa aja(user) yang udah login hari ini, nnti ada Id_User,Username, sm waktu loginnya
9. grafik, nnti digenerate berdasarkan hasil survey, parameternya misal, grafik khusus untuk survey 1, nnti bisa dibuat tab per pertanyaan, absisnya diisi pil jawaban, ordinatnya brp jumlah yg ngisi jawaban tsbt, nnti geser ke tab pertanyaan lain, beda lagi grafiknya, simpelnya gtu, atau nnti dibikin gmn ya kedepan dipikirin lagi

surveyor:
1. sm sprti admin, nnti ada profil, dan edit profil, bisa ganti password yg sbelumnya udh dibuat sm admin, lengkapnya liat db
3. MONITORING, intinya ini data kunjungan dan survey lapangan yang udah dilakuin oleh surveyor, satu monitoring buat satu tower bts, struktur datanya apa, liat aja dbnya. 
2. SURVEY, klo ini beda sm punyanya admin, si surveyor bisa liat semua survey yg ada, baik yg dikerjakan atau belum, yg udah bisa dikasih warna ijo, yg belum merah misal, nnti dia bisa ngerjain survey baru yg belum dikerjain, atau ngedit jawaban dari survey yg udah dikerjain. waktu editnya otomatis kegenerate.
jawaban survey bakal jadi pertimbangan grafik survey, liat dbnya


#### Back End
1. Belajar dulu PHP Dasar, Laravel, MySQL, HTML, dan JS
2. Pahami alur pembuatan web dengan laravel
3. Pahami DataBase yg ada
4. Pikirkan kemungkinan fitur atau system request baru yang diperlukan
5. Lengkapi tiap tools yang diperlukan, install sampai bisa digunakan
6. Tetap koordinasi sm front end, terutama untuk kemungkinan fitur yg ada

### Daftar Referensi, Video, dan Belajar
1. [Koleksi Template Admin](https://yukcoding.id/download-koleksi-template-bootstrap-responsive-gratis/)
2. [Playlist Belajar Laravel - YukCoding](https://youtube.com/playlist?list=PLTagRbmJ8etsOURVDlOryVKcNEUn6nFeu)
3. [Playlist Belajar Laravel - WP UNPAS](https://www.youtube.com/watch?v=HqAMb6kqlLs&list=PLFIM0718LjIWiihbBIq-SWPU6b6x21Q_2)
4. [Playlist Belajar PHP Dasar - WP UNPAS](https://www.youtube.com/watch?v=l1W2OwV5rgY&list=PLFIM0718LjIUqXfmEIBE3-uzERZPh3vp6)
5. [Contoh Bikin Aplikasi Laravel, Integrasi Design Template dengan laravel, migrasi DB, dll ](https://youtu.be/Hh1atKEzNWs)
6. [Contoh Config APL](https://www.youtube.com/watch?v=5E5v9HvYsuc)
7. [Tutor GIT, No DeepShit](https://rogerdudler.github.io/git-guide/)

#### [Link DB ERD](https://lucid.app/lucidchart/23f827ba-14f6-47c7-8bb9-fb5828d430ea/edit?beaconFlowId=681F0BE4872C115C&invitationId=inv_e4e1f624-bc44-4c2d-a9ac-c44c9ef1dec8&page=uta8ncyJ8mfT#)

#### [Link Sheet](https://docs.google.com/spreadsheets/d/1KJWBlI9jHXwi1i2Ha6F877Je4AebqTiH0rWxypQhqDE/edit#gid=0)

#### [Link Mockup]()

### TroubleShooting
1. [https://askubuntu.com/questions/890818/ubuntu-16-04-how-to-start-xampp-control-panel](https://askubuntu.com/questions/890818/ubuntu-16-04-how-to-start-xampp-control-panel)
2. [https://vitux.com/ubuntu-xampp/](https://vitux.com/ubuntu-xampp/)
3. [https://medium.com/@kivaimuinde/resolve-opt-lampp-bin-mysql-server-264-kill-no-such-process-3a62d2331349](https://medium.com/@kivaimuinde/resolve-opt-lampp-bin-mysql-server-264-kill-no-such-process-3a62d2331349)
4. [https://www.centerklik.com/error-xampp-starting-apache-fail-di-linux/](https://www.centerklik.com/error-xampp-starting-apache-fail-di-linux/)
5. [https://askubuntu.com/questions/890818/ubuntu-16-04-how-to-start-xampp-control-panel](https://askubuntu.com/questions/890818/ubuntu-16-04-how-to-start-xampp-control-panel)
6. 
...still updating, silakan klo ada info tambahan, edit readme ini

### New Message Updated
#### FrontEnd:
1. Fokus saja pada dashboard, untuk laman visitor diskip dulu
2. Sekarang untuk mengedit frontend pakainya views laravel, "BTS-Monitoring-Website/Apl Laravel/BTSApp/resources/views/"\
3. file css dan js ada di folder public "BTS-Monitoring-Website/Apl Laravel/BTSApp/public/", css jangan banyak"/perpage, udah kubikin dua yg utama, dashboard.css sm visitor.css, taruh aja class/id yg general untuk dashboard dan visitor disitu, klo memang ada page yg perlu file sendiri, yaudah bikin/pake aja file css khusus utk page itu
4. file js, jika sifatnya universal (digunakan di semua page), taruh saja(function, variable, dll) di satu file, (dashboard.js dan visitor.js), namun jika script js khusus untuk halaman tertentu, maka taruh saja di tiap page (view) nya.
5. Disarankan untuk sering menggunakan class bootstrap, supaya css class/id yg dibuat tidak terlalu banyak
6. Pada views, terdapat layout dan partials yang merupakan template dari laman visitor
7. Layouts berisi main.blade.php, ini adalah layout html keseluruhan (head, body), dimana pada view ini semua css dan js diimport dimana templating akan dilakukan di body pakai @yield
8. Partials berisi navbar.blade.php, ini adalah layout untuk navbar, navbar akan digunakan di semua page di visitor
9. Pada views terdapat folder dashboard, yang tentu saja untuk tampilan dashboard
10. Pada folder dashboard, terdapat folder layout, admin, dan surveyor
11. Layout pada dashboard sekali lagi untuk templating, berisi header (tamplate header untuk tiap halaman dashboard), main (untuk templating head, dan body untuk tiap page dashboard), sidebar (template sidebar, krn tiap page di dashboard punya sidebar, jadi ngeditnya sekali saja di view sidebar ini)
12. Untuk sidebar, taruh saja semua ul dan li dari link tiap page di file view ini, semuanya (admin sm surveyor)
13. Kebanyakan view di dashboard, adalah index, create, edit, dan show, dan ini kuletakkan di dalam tiap folder. ini sudah sesuai template di controller ya teman", biarkan seperti itu aja namanya, yg kalian bikin adalah isinya. misal untuk page bts, index digunakan untuk tampilan awal ketika buka page bts, edit adalah view untuk page edit, show adalah page ketika kita klik tombol show, yg isinya data yg udah kita input, create adalah view page yg muncul ketika kita klik tombol add new bts. nanti juga ada tombol delete, namun ini tidak perlu dibikin view.
14. Untuk page survey di surveyor, agak berbeda. index berisi semua survey yang akan atau telah diisi surveyor (bisa berbentuk card). nanti di tiap card ada tombol view, ketika tombol ini diklik view yang bekerja adalah show.blade.php. pada page show, ada tombol edit, ketika di klik, view yang bekerja adalah edit.blade.php

#### File" yang perlu diskip dulu
1. Semua folder Monitoring di folder surveyor (krn nnti designnya perlu dibahas lagi)
2. Folder Config di folder Admin, dibahas lagi nnti designnya gimana
3. Semua view visitor, fokus dulu ke dashboard, visitor nanti saja (rencana mungkin saja, nanti akan dihilangkan)

### Tolong modifikasi view login
## Views tolong klo sudah ada yg selesai langsung segera dicommit, krn backend baru bisa kerja kalau views udah ada, tolong kerjasamanya!
### Requirements yang diperlukan:
1. VSCode
2. Git
3. Browser
4. XAMPP latest
5. Composer latest (http://getcomposer.org)
6. valet for laravel 
7. Trix text editor (https://github.com/basecamp/trix)
8. Laravel Sluggable (https://github.com/cviebrock/eloquent-sluggable)
9. Laravel Generators (https://github.com/laracademy/generators)
10. Xdebug (Optional)
### VSCode Extensions:
1. Laravel Artisan
2. Laravel Blade
3. Laravel Blade Formatter
4. Laravel Blade Spacer
5. Laravel Blade Wrapper
6. Laravel Snippets 
7. PHP Debug (Optional)

### Untuk pengetahuan, monggo lihat playlist belajar Laravel 8 dari WP UNPAS (aku belajar dari sini)
#### (https://www.youtube.com/watch?v=HqAMb6kqlLs&list=PLFIM0718LjIWiihbBIq-SWPU6b6x21Q_2) (kusarankan untuk front end, minimal lihat video konfigurasi sampai pengetahuan structurenya)
### Jika butuh referensi repo aplikasi dari laravel, aku punya repo yang kubikin berdasarkan tutorial laravel dari WP UNPAS diatas, kalian bisa liat structure viewnya, controller, model, migrations, dll 
#### ini file reponya : https://github.com/bytadit/belajar-laravel
### Sementara ini dulu, kalau ada kesulitan monggo cari tutorial, atau tanya ke aku/ di grup 

