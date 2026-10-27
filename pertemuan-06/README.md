# pertemuan-06# P6 – PHP Dasar dan Pemrograman Sisi Peladen

## Informasi Praktikum

- **Mata kuliah:** Pemrograman Web Dasar (IS205)
- **Pertemuan:** 6 (P6)
- **Materi:** PHP Dasar dan Pemrograman Sisi Peladen
- **Program studi:** Sistem Informasi
- **Semester:** Gasal 2026/2027
- **Institusi:** Institut Sains dan Bisnis Atma Luhur

## Deskripsi

Proyek P6 merupakan pengembangan dari artefak Pertemuan 5 (P5). Halaman web yang sebelumnya menggunakan HTML, CSS, dan JavaScript dikembangkan dengan PHP agar sebagian kontennya dapat dihasilkan secara dinamis melalui peladen web lokal.

Pengembangan dilakukan pada direktori `pertemuan-06` dengan mempertahankan berkas pendukung P5 yang masih digunakan, seperti `style.css`, `script.js`, dan gambar profil. Berkas halaman utama diubah dari `index.html` menjadi `index.php`.

## Tujuan

Setelah menyelesaikan P6, proyek diharapkan menerapkan:

1. PHP sebagai bahasa pemrograman sisi peladen dan menjalankan skrip melalui peladen lokal.
2. Variabel, konstanta, tipe data dasar, dan operator PHP.
3. Percabangan `if`, `elseif`, `else`, dan `switch`.
4. Perulangan `for` dan `while`.
5. Fungsi bawaan PHP serta sintaks keluaran PHP.
6. Pengujian dan debugging melalui `localhost`.
7. Dokumentasi perkembangan serta pengelolaan versi menggunakan Git dan GitHub.

## Teknologi dan Perangkat

- HTML
- CSS
- JavaScript
- PHP
- Laragon sebagai lingkungan peladen lokal
- Apache sebagai peladen web
- Git dan GitHub untuk pengelolaan versi

## Struktur Proyek

Struktur berikut merupakan gambaran umum. Pertahankan nama berkas dan folder aset sesuai proyek P5 yang kamu salin.
## Persiapan dan Cara Menjalankan

1. Salin artefak P5 ke folder `pertemuan-06`. Jangan mengubah atau menghapus proyek P5 asli.
2. Pastikan berkas pendukung yang masih digunakan tersedia, termasuk `style.css`, `script.js`, dan gambar profil.
3. Ubah nama halaman utama dari `index.html` menjadi `index.php`.
4. Letakkan folder proyek di dalam document root Laragon, yang umumnya berada di `C:\laragon\www\`. Lokasi dapat berbeda bergantung pada konfigurasi Laragon.
5. Buka Laragon, lalu klik **Start All**. Pastikan layanan Apache berjalan.
6. Buka proyek melalui peramban menggunakan alamat `localhost` yang sesuai dengan lokasi folder proyek.
7. Simpan setiap perubahan pada `index.php`, muat ulang halaman, lalu periksa hasilnya.

**Penting:** Jangan membuka berkas PHP hanya dengan mengeklik berkas dari File Explorer. PHP harus diproses melalui peladen web, misalnya Laragon, agar kode PHP dijalankan.

### Alamat proyek

Tuliskan alamat yang benar-benar sesuai dengan folder proyek di komputermu:

```text
http://localhost/2622500032-PWD-SI1J-2627O/pertemuan-06/index.php
```

Modul memberikan contoh alamat proyek yang spesifik untuk lingkungan perkuliahan. Jika jalur folder di komputermu berbeda, sesuaikan alamat tersebut; jangan menyalin contoh secara membabi buta.

## Materi dan Fitur yang Diterapkan

### 1. Dasar PHP dan HTML

- Menulis kode PHP di antara tag `<?php` dan `?>`.
- Menyisipkan PHP ke dalam dokumen HTML.
- Menggunakan komentar satu baris (`//` atau `#`) dan komentar beberapa baris (`/* ... */`).
- Menggunakan `echo` dan `print` untuk menghasilkan keluaran.
- Memahami perbedaan konten HTML statis dan konten dinamis yang dihasilkan PHP.

### 2. Variabel, Konstanta, dan Tipe Data

Proyek menggunakan konsep variabel dan konstanta untuk menyimpan data profil. Contoh nama variabel yang dibahas dalam modul meliputi:

- `$nim`
- `$namaMahasiswa`
- `$programStudi`
- `$tahunAkademik`
- `$semester`
- `$ipk`
- `$statusAktif`
- `$catatanTambahan`

Modul juga membahas konstanta `NAMA_MATA_KULIAH` dan `PROFIL_GITHUB`, serta tipe data `string`, `integer`, `float`, `boolean`, dan `NULL`.

**Sesuaikan nilai identitas** dengan data yang memang ditetapkan untuk proyekmu. Jangan menggunakan identitas contoh dari modul sebagai identitas pribadi jika bukan milikmu.

### 3. Operator PHP

- Operator aritmetika dan penugasan, misalnya `-` dan `=`.
- Operator perbandingan, misalnya `>=` dan `<=`.
- Operator logika `&&`.
- Operator penggabungan string `.`.
- Operator ternary `? :`.
- Operator identik `===` untuk memeriksa nilai dan tipe data, termasuk `NULL`.

Contoh penerapan pada modul adalah menghitung sisa semester dan memeriksa apakah nilai semester berada dalam rentang yang ditentukan.

### 4. Percabangan

- `if`, `elseif`, dan `else` untuk menentukan keterangan semester.
- Operator ternary untuk menentukan nama program studi dan status mahasiswa.
- `switch`, `case`, dan `default` untuk menentukan fokus program studi.

### 5. Perulangan

- `for` untuk menghasilkan lima butir target belajar.
- `while` untuk menampilkan nomor Semester 1 sampai Semester 3.

### 6. Fungsi Bawaan dan Sintaks Keluaran

- `number_format()` untuk menampilkan IPK dengan dua angka desimal.
- `date("Y")` untuk menampilkan tahun berdasarkan waktu peladen.
- `<?= ... ?>` sebagai sintaks singkat untuk menampilkan nilai PHP.
- Pemeriksaan `NULL` untuk menampilkan keterangan ketika catatan tambahan belum memiliki nilai.

### 7. Penyesuaian Formulir

Atribut `action` pada formulir disesuaikan dari `index.html` menjadi `index.php`. Pada P6, perubahan ini hanya menyesuaikan tujuan formulir; pemrosesan data formulir menggunakan PHP merupakan materi P7.

## Pengujian

Jalankan proyek melalui `localhost`

- Laragon dan Apache berjalan.
- Halaman `index.php` dapat diakses melalui `localhost`.
- Kode PHP diproses dan keluarannya tampil pada halaman.
- Struktur serta tampilan dari P5 yang masih diperlukan tetap dipertahankan.
- Informasi profil yang menggunakan variabel dan konstanta tampil sesuai nilai yang ditetapkan.
- Perhitungan sisa semester dan pemeriksaan rentang semester menghasilkan keluaran yang sesuai.
- Percabangan `if-elseif-else`, ternary, dan `switch` menghasilkan keluaran sesuai kondisi yang diuji.
- Perulangan `for` menghasilkan lima target belajar.
- Perulangan `while` menghasilkan Semester 1, Semester 2, dan Semester 3.
- IPK ditampilkan dengan format dua angka desimal.
- Keterangan catatan tambahan sesuai dengan nilai `NULL` atau nilai pengujian.
- Footer menampilkan tahun, nama, dan NIM sesuai kode.
- Tautan profil GitHub mengarah ke alamat yang dibentuk dari konstanta `PROFIL_GITHUB`.
- Atribut `action` formulir mengarah ke `index.php`.
- Tidak ada galat yang belum ditangani.

## Dokumentasi Perkembangan

Catat perubahan dan hasil pemeriksaan secara bertahap di README ini, misalnya:

| Tahap | Perubahan yang didokumentasikan | Hasil aktual 
| Persiapan | Menyalin artefak P5 ke folder `pertemuan-06` dan memeriksa berkas pendukung 
| Persiapan PHP | Mengubah `index.html` menjadi `index.php` dan menyiapkan Laragon 
| Dasar PHP | Menguji tag PHP, komentar, `echo`, `print`, dan keluaran dinamis 
| Data dan operator | Menambahkan variabel, konstanta, tipe data, dan operator 
| Percabangan | Menerapkan `if-elseif-else`, ternary, dan `switch` 
| Perulangan | Menerapkan `for` dan `while` 
| Fungsi bawaan | Menguji `number_format()`, `date()`, sintaks `<?= ... ?>`, dan `NULL` 
| Formulir | Menyesuaikan atribut `action` ke `index.php`
| Pemeriksaan akhir | Menguji seluruh fitur dan memperbaiki galat jika ada 

## Pengelolaan Versi dengan Git

Setelah perubahan bermakna selesai, periksa dan uji kode, lalu catat hasil aktualnya di README. Jalankan perintah berikut dari direktori proyek:

```bash
git status
git add .
git commit -m "mendeskripsikan perubahan yang telah diuji"
git push
```

Ganti pesan commit dengan deskripsi perubahan yang benar-benar dilakukan. Pastikan commit dan push berhasil sebelum mencatatnya sebagai selesai. Jika repositori belum dihubungkan ke GitHub, konfigurasi repositori terlebih dahulu sesuai instruksi perkuliahan.

## Batasan P6

P6 berfokus pada dasar PHP dan eksekusi kode di sisi peladen. Pemrosesan serta validasi masukan formulir menggunakan PHP, metode GET dan POST, session, pola Post-Redirect-Get (PRG), dan pengelolaan data formulir dibahas pada P7. Pengelolaan basis data juga bukan fokus praktik P6.