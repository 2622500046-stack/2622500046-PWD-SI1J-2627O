<?php
// P6: PHP dasar dan pemrograman sisi peladen
// Bagian 1: Variabel dan konstanta
$nim = "2622500046";
$namaMahasiswa = "Muhammad Ramadhani";
$programStudi = "SI";
$tahunAkademik = "2026/2027";
$semester = 1;
$ipk = 3.90;
$statusAktif = true;
$catatanTambahan = null;
const NAMA_MATA_KULIAH = "Pemrograman Web Dasar";
const PROFIL_GITHUB = "2622500046-stack";
// Bagian 2: Operator
$batasSemester = 8;
$sisaSemester = $batasSemester - $semester;
$semesterValid = $semester >= 1 && $semester <= $batasSemester;
$statusSemester = ($semesterValid && $statusAktif) ? "Sesuai rentang" : "Perlu diperiksa";

// Bagian 3: Percabangan if-elseif-else
$namaProdi = ($programStudi == "SI") ? "Sistem Informasi" : (($programStudi == "TI") ? "Teknik
Informatika" : "Lainnya");
if ($semester < 3) {
$keteranganSemester = "Semester awal";
} elseif ($semester <= 6) {
$keteranganSemester = "Semester menengah";
} else {
$keteranganSemester = "Semester akhir";
}

// Bagian 4: Percabangan switch-case-default
switch ($programStudi) {
case "SI":
    $fokusProgramStudi = "Sistem informasi dan proses bisnis";
break;
case "TI":
$fokusProgramStudi = "Komputasi dan pengembangan perangkat lunak";
break;
default:
$fokusProgramStudi = "Belum ditentukan";
}
?>

<!doctype html>
<html lang="id">-
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profil Mahasiswa</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
<header>
    <div class="header-top">
    <h1>Profil Mahasiswa</h1>

    <button
        class="nav-toggle"
        id="navToggle"
        type="button"
        aria-label="Buka navigasi"
        aria-controls="navMenu"
        >
         &#9776;
    </button>
    </div>

    <nav id="navMenu">
        <ul>
            <li><a href="#home">Beranda</a></li>
            <li><a href="#about">Tentang</a></li>
            <li><a href="#contact">Kontak</a></li>
        </ul>
        </nav>
</header>

<main>
    <section id="about">
        <h2>Selamat Datang</h2>
        <p>Halo, saya <strong><?php echo $namaMahasiswa; ?></strong>. Saya sedang mempelajari matakuliah
        <strong><?php print NAMA_MATA_KULIAH; ?></strong> pada tahun akademik <?php echo $tahunAkademik;    
        ?>.</p>
        
        <img src="img/foto-profil.jpeg" width="200" height="250" alt="Foto Profil" />
    </section>

    <section id="about">
        <h2>Tentang Saya</h2>

        <article>
            <h3>Profil Singkat</h3>
            <p>Sisa semester hingga batas: <?php echo $sisaSemester; ?></p>
            <p>Pemeriksaan rentang semester: <?php echo $statusSemester; ?></p>
            <p>Saya mahasiswa Program Studi Sistem Informasi.</p>
            <p>Semester: <?php echo $semester . " (" . $keteranganSemester . ")"; ?></p>
            <p>Program Studi: <?php echo $namaProdi . " (" . $programStudi . ")"; ?></p>
            <p>Status mahasiswa: <?php echo $statusAktif ? "Aktif" : "Tidak aktif"; ?></p>
            <p>Fokus program studi: <?php echo $fokusProgramStudi; ?></p>
            <p>IPK: <?php echo number_format($ipk, 2, ',', '.'); ?></p>
            <p>Catatan tambahan: <?php echo $catatanTambahan === null ? "Belum ada" : $catatanTambahan;
            ?></p>
    
            <h3>Target Belajar</h3>
            <h3>Target Belajar (Perulangan for)</h3>
            <ol>
            <?php
            // Perulangan for tanpa array; materi larik dibahas pada P9.
            for ($i = 1; $i <= 5; $i++) {
            echo "<li>Target belajar ke-" . $i . ": ";
            switch ($i) {
            case 1:
            echo "Memahami sintaks dasar PHP.";
            break;
            case 2:
            echo "Menggunakan variabel dan konstanta.";
            break;
            case 3:
            echo "Menerapkan operator dan percabangan.";
            break;
            case 4:
            echo "Menggunakan perulangan for dan while.";
            break;
            default:
            echo "Belum dipetakan";
            break;
            }
            echo "</li>";
            }
            ?>
            </ol>

            <h3>Semester (Perulangan while):</h3>
            <ol>
            <?php
            $nomorSemester = 1;
            while ($nomorSemester <= 3) {
            echo "<li>Semester " . $nomorSemester . "</li>";
            $nomorSemester++; // operator penugasan
            }
            ?>
            </ol>
        </article>
    </section>

    <section id="contact">
        <h2>Kontak</h2>
        <p>
            kunjungi
             <a target="_blank" href="https://github.com/<?= PROFIL_GITHUB ?>">profil GitHub saya</a>
            </p>
    
        <form id="contactForm" action="index.html" method="get" novalidate> 
         <div class="form-group">
        <label for="nama">Nama Lengkap</label><br />

        <input
        class="input-form"
        type="text"
        id="nama"
        name="nama"
        placeholder="Masukkan nama lengkap"
        minlength="3"
        maxlength="50"
        required
    />
</div>

    <div class="form-group">
        <label for="email">Email</label><br />

        <input class="input-form" type="email" id="email" name="email" placeholder="nama@email.com" required />
    </div>

    <div class="form-group">
        <label for="semester">Semester</label><br />

        <input class="input-form" type="number" id="semester" name="semester" min="1" max="14" required />
    </div>

    <div class="form-group">
        <label for="tanggal">Tanggal Kunjungan</label><br/>
        <input class="input-form" type="date" id="tanggal" name="tanggal" required />
    </div>

    <div class="form-group">
        <p>Jenis Pesan</p>

        <input type="radio" id="pertanyaan" name="jenis_pesan" value="pertanyaan" required />
        <label for="pertanyaan">Pertanyaan</label>

        <input type="radio" id="saran" name="jenis_pesan" value="saran" />
        <label for="saran">Saran</label>
    </div>

    <div class="form-group">
        <p>Topik yang Diminati</p>

        <input type="checkbox" id="minat-html" name="minat" value="HTML" />
        <label for="minat-html">HTML</label>

        <input type="checkbox" id="minat-css" name="minat" value="CSS" />
        <label for="minat-css">CSS</label>
    </div>

    <div class="form-group">
        <label for="prodi">Program Studi</label><br />

        <select class="input-form" id="prodi" name="prodi" required>
        <option value="">-- Pilih Program Studi --</option>
        <option value="SI">Sistem Informasi</option>
        <option value="TI">Teknik Informatika</option>
    </div>

    <div class="form-group">
        <label for="prodi">Program Studi</label><br />
       
        <textarea
        class="input-form"
        id="pesan"
        name="pesan"
        maxlength="300"
        placeholder="Tulis pesan Anda"
        required
        ></textarea>
    </div>

    <button type="submit">Kirim</button>
    <button type="reset">Batal</button>
    <p id="formFeedback"></p>
  </form>
 </section>
</main>

<footer>
    <p>&copy; <?= date("Y") ?> <?php echo $namaMahasiswa; ?> [<?= $nim ?>]</p>
    </footer>
    <script src="script.js"></script>
</body>
<!-- </html> -->

<p>
Kunjungi
<a target="_blank" href="https://github.com/<?= PROFIL_GITHUB ?>">profil GitHub saya</a>.
</p>