# BTS-Monitoring-Website
[WEB PROGRAMMING PROJECT]  : A Base Transceiver Station Website based on Laravel 8, Made By Group 3

### Penjelasan Umum
1. Ini adalah website yang menampung informasi BTS di Kota ABC
2. Website terhubung/memiliki laman admin, untuk memonitoring Data BTS, dan laman Surveyor untuk memberikan data tentang BTS di Kota ABC.
3. Website dibuat dengan Laravel 8 dan DataBase MySQL
4. Website memiliki 3 macam layout, yakni:

a. Layout Admin, merupakan tampilan sistem informasi yang memberikan privileges bagi admin untuk mengelola website (Privileges Admin akan dijelaskan lebih lanjut)
b. Layout Surveyor, merupakan tampilan sistem informasi yang diperuntukkan untuk surveyor (peran surveyor akan dijelaskan lebih lanjut)
c. Layout Visitor, merupakan tampilan website biasa yang berisikan informasi tentang BTS yang ada di kota ABC, layout ini diperuntukkan untuk pengunjung yang tidak termasuk ke dalam admin maupun visitor, namun layout ini merupakan starting layout karena berisi link untuk login, baik sebagai surveyor maupun admin

3. Database menggunakan mySQL, penjelasan akan diberikan lebih lanjut
4. ....soon akan diupdate lagi

### System Request

#### Laman Visitor
1. Kemampuan Untuk menampilkan profile company biasa (kominfo kota ABC), yg berisi alamat, logo, dll
2. Kemampuan untuk menampilkan informasi BTS yang ada di kota ABC
3. Kemampuan untuk menampilkan hasil monitoring BTS dan grafiknya (masih dikaji ulang, perlu atau gak)
4. Laman Visitor bisa dikatakan sbg landing page (+ tambahan utk laaman info bts, dsb), yg punya header footer spt web biasa

#### Laman Admin
1. Kemampuan melihat plotting/grafik berdasarkan hasil survey
2. Kemampuan untuk menambah/menghapus daftar surveyor
3. Kemampuan untuk menambah, mengedit, menghapus informasi BTS


### Penjelasan Database dan Kemungkinan Fitur

#### Tabel Config Aplikasi
Ini adl database yang berisi konfigurasi aplikasi, seperti logo (kominfo), alamat kominfo, dll, yang nantinya bakal kepake ditiap laman (visitor, admin, surveyor), 
    coba liat video ini untuk sedikit insight tentang config [config insight](https://www.youtube.com/watch?v=5E5v9HvYsuc)
    
#### Laman Visitor
1. Fitur (button) untuk Login ke surveyor, atau admin 
2. Fitur Contact Form, yang direct ke laman admin
3. Profil Kominfo
4. Info BTS, yg berupa page tersendiri berisi list BTS, dan nnti kemungkinan bakal ada gmapsnya.
5. Tidak perlu pakai fitur pencarian klo gk bisa (klo mau nnti bisa dipake di page info bts, ini optional aja)
6. (Mungkin) ada info pemilik BTS, (yg mungkin) bisa diwujudkan kyk list partner spt ini:

8. Design lain" spt web biasa
 

#### Laman Admin
1. Tambah, Hapus Surveyor
2. Plot Grafik Hasil Survey, dari laman surveyor, biasanya ada di home laman admin, yg didampingi report" lainnya, nnti lia aja contohnya
3. Edit Profil, termasuk upload foto dan edit password
4. Untuk sementara admin tidak bisa menghapus admin lain
5. Kuesioner, ada list kuesioner yg udah dibuat, tiap kuesioner bisa dihapus atau diedit isinya, bisa juga bikin kuesioner baru, referensinya bisa cari di web survey kyk nusaresearch, swagbucks, dll
6. Kuesioner berisi pertanyaan dan pilihan jawaban
7. Bakal ada editing info
8. Info BTS, ada list BTS, admin bisa nambah list, bisa ngedit info BTS, bisa juga ngedit infonya
9. Info Pemilik BTS, admin bisa ngedit, nambah, ngehapus
10. Wilayah, admin bisa ngedit, nambah, ngehapus list" wilayah yg ada BTSnya
11. Pada Info BTS, form yg isinya berelasi dengan database, bisa dibuat dropdown yang langsung berisi list dri database yg dituju, misal form untuk pemilik, mk bisa berisi dropdown nama" pemilik BTS, jdi tidak perlu ngetik, 
    (mungkin untuk ini, akan ada fitur dimana, jika isian berelasi dgn db (berupa dropdown), dan data yg diketikkan belum ada di db, maka otomatis datanya akan ditambahkan sbg data baru ke db, misal mau ngisi pemilik adl pertamina, tpi di dropdown tidak ada, mk admin bisa ngetik pertamina di isian pemilik, dan pertamina akan dijadikan data baru di tabel pemilik, (akan dibuatkan idnya juga)
11. fitur logout

#### Laman Surveyor
1. Di Home ada jml survey yg udah dikerjakan, , jml upcoming survey (yg belum dikerjakan), jml bts yg udah dimonitor, dsb, designnya kek gini:
   
3. fitur edit profil, termasuk password
4. Informasi BTS, yg digenerate dari laman admin (tabel INFO_BTS)
5. Kuesioner, isinya ada survey baru yg belum dikerjain, ada list" riwayat pengisian survey/kuesioner (misal survey blabla", selesai pada bla"") nnti jawaban dri survey yg udah dikerjain itu bisa diedit lagi isinya sm surveyor, nnti bakal ada editing info
6. Monitoring, isinya list" riwayat monitoring yg udah dilakuin, termasuk berisi BTS yg dimonitoring yg merefer ke tabel info_bts

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
5. PHP Composer (Dependency Manager)
6. Browser
7. Git
8. Niat, waktu

### Catatan & Job Desc Untuk Developer
1. Untuk saat ini admin tidak bisa dibuat oleh siapapun (sudah pakem), tpi mungkin kedepan, admin baru bisa dibuat oleh admin lama (tpi yg jelas tidak bisa signup sendiri sbg admin)
2. Surveyor, untuk sementara hanya bisa dibuat oleh admin, tpi mungkin kedepan visitor bisa jadi surveyor lewat fitur sign up yg mungkin bakal disediakan di laman visitor
3. Silakan pakai template, referensi, library, maupun contoh apapun bebas, yang terpenting bisa memudahkan, cepet selesai dan tetap ATM (jgn full jiplak)
4. Tetap komunikasi satu sama lain !!

#### Front End
1. Yg plot grafik ada yg pake library js btw
2. Pahami database, system request, dan kemungkinan fitur yang ada
3. Silakan Buat Design, HTML, CSS, JS untuk tampilan pada layout Visitor, Admin, dan Surveyor
4. Tampilan Layout Admin dan Visitor bisa pakai design yang sama, namun kontennya tetap berbeda (menyesuaikan database, dan system request yang diperlukan)
5. Untuk design, demi kecepatan, boleh juga pakai template design laravel yang sudah tersedia banyak di internet secara gratis (sudah ada bbrp contoh di folder Referensi terutama utk yg admin), namun tetap buat perbedaan dan kontennya tetap menyesuaikan system request
6. Mockup Design boleh pakai figma atau apapun bebas, atau langsung ngoding jga boleh, penting jadi
7. Tetap koordinasi dengan backend, supaya tetap satu pemahaman
8. Desgin Form untuk kuis, nnti isi pertanyaan dan pilihan jawaban kuis (mungkin) bisa dipikir bareng"

#### Back End
1. Belajar dulu PHP Dasar, Laravel, MySQL, HTML, dan JS
2. Pahami alur pembuatan web dengan laravel
3. Pahami DataBase yg ada
4. Pikirkan kemungkinan fitur atau system request baru yang diperlukan
5. Lengkapi tiap tools yang diperlukan, install sampai bisa digunakan
6. Tetap koordinasi sm front end, terutama untuk kemungkinan fitur yg ada

