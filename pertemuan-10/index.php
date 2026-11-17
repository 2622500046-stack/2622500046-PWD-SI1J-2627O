
<?php
session_start();

// ==========================================
// PROSES DATA FORMULIR
// ==========================================

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nama = trim($_POST["nama"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $semesterForm = trim($_POST["semester"] ?? "");
    $tanggal = trim($_POST["tanggal"] ?? "");
    $jenisPesan = trim($_POST["jenis_pesan"] ?? "");
    $minat = $_POST["minat"] ?? [];
    $prodi = trim($_POST["prodi"] ?? "");
    $pesan = trim($_POST["pesan"] ?? "");

    if (!is_array($minat)) {
        $minat = [];
    }

    // Simpan data formulir
    $_SESSION["form_data"] = [
        "nama" => $nama,
        "email" => $email,
        "semester" => $semesterForm,
        "tanggal" => $tanggal,
        "jenis_pesan" => $jenisPesan,
        "minat" => $minat,
        "prodi" => $prodi,
        "pesan" => $pesan
    ];

    // Kembali ke halaman kontak
    header("Location: index.php#contact");
    exit;
}


// ==========================================
// DATA PROFIL MAHASISWA
// ==========================================

$nim = "2622500046";
$namaMahasiswa = "Muhammad Ramadhani";
$programStudi = "SI";
$tahunAkademik = "2026/2027";
$semester = 1;
$ipk = 3.90;
$statusAktif = true;
$catatanTambahan = null;

$batasSemester = 8;
$sisaSemester = $batasSemester - $semester;

const NAMA_MATA_KULIAH = "Pemrograman Web Dasar";
const PROFIL_GITHUB = "2622500046-stack";

$semesterValid = $semester >= 1 && $semester <= $batasSemester;

$statusSemester = ($semesterValid && $statusAktif)
    ? "Sesuai rentang"
    : "Perlu diperiksa";


// ==========================================
// PERCABANGAN IF ELSE
// ==========================================

if ($semester < 3) {
    $keteranganSemester = "Semester awal";
} elseif ($semester <= 6) {
    $keteranganSemester = "Semester menengah";
} else {
    $keteranganSemester = "Semester akhir";
}

$namaProdi = ($programStudi == "SI")
    ? "Sistem Informasi"
    : (($programStudi == "TI")
        ? "Teknik Informatika"
        : "Lainnya");


// ==========================================
// SWITCH CASE
// ==========================================

switch ($programStudi) {

    case "SI":
        $fokusProgramStudi = "Sistem informasi dan proses bisnis";
        break;

    case "TI":
        $fokusProgramStudi = "Komputasi dan pengembangan perangkat lunak";
        break;

    default:
        $fokusProgramStudi = "Belum ditentukan";
        break;
}


// ==========================================
// FUNGSI MEMBERSIHKAN OUTPUT
// ==========================================

function bersihkan($data) {
    return htmlspecialchars((string) $data, ENT_QUOTES, "UTF-8");
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profil Mahasiswa</title>

    <link rel="stylesheet" href="style.css">

    <style>
        /* Tampilan hasil pesan */

        .submission-result {
            margin-top: 30px;
            padding: 25px;
            background: #ffffff;
            border: 2px solid #003366;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.10);
        }

        .submission-result h3 {
            color: #003366;
            border-bottom: 2px solid #003366;
            padding-bottom: 12px;
            margin-bottom: 20px;
        }

        .submission-result p {
            margin: 12px 0;
            line-height: 1.6;
        }

        .submission-result strong {
            color: #003366;
        }

        .pesan-diterima {
            background: #eef6ff;
            padding: 15px;
            border-radius: 8px;
            border-left: 5px solid #003366;
            white-space: pre-wrap;
            overflow-wrap: anywhere;
        }

        .status-pesan {
            display: inline-block;
            background: #d1fae5;
            color: #065f46;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 14px;
        }

        .tombol-hapus {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 18px;
            background: #dc2626;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }

        .tombol-hapus:hover {
            background: #991b1b;
        }
    </style>

</head>

<body>

    <!-- HEADER -->

    <header>

        <div class="header-top">

            <h1>Profil Mahasiswa</h1>

            <button
                class="nav-toggle"
                id="navToggle"
                type="button"
                aria-label="Buka navigasi"
                aria-controls="navMenu"
                aria-expanded="false">

                ☰

            </button>

        </div>

        <nav>
            <ul id="navMenu">
                <li><a href="#home">Beranda</a></li>
                <li><a href="#about">Tentang</a></li>
                <li><a href="#contact">Kontak</a></li>
            </ul>
        </nav>

    </header>


    <main>

        <!-- BERANDA -->

        <section id="home">

            <h2>Selamat Datang</h2>

            <p>
                Halo, saya <strong><?= bersihkan($namaMahasiswa); ?></strong>.
                Saya sedang mempelajari mata kuliah
                <strong><?= bersihkan(NAMA_MATA_KULIAH); ?></strong>
                pada tahun akademik
                <?= bersihkan($tahunAkademik); ?>.
            </p>

            <img
                src="img/foto-profil.jpeg"
                alt="Foto Profil Muhammad Ramadhani">

        </section>


        <!-- TENTANG SAYA -->

        <section id="about">

            <h2>Tentang Saya</h2>

            <article>

                <h3>Profil Singkat</h3>

                <p>Nama: <?= bersihkan($namaMahasiswa); ?></p>

                <p>NIM: <?= bersihkan($nim); ?></p>

                <p>Program Studi: <?= bersihkan($namaProdi); ?></p>

                <p>Fokus Program Studi: <?= bersihkan($fokusProgramStudi); ?></p>

                <p>Status Mahasiswa: <?= $statusAktif ? "Aktif" : "Tidak aktif"; ?></p>

                <p>
                    Semester:
                    <?= bersihkan($semester . " (" . $keteranganSemester . ")"); ?>
                </p>

                <p>Sisa Semester: <?= bersihkan($sisaSemester); ?></p>

                <p>Pemeriksaan Semester: <?= bersihkan($statusSemester); ?></p>

                <p>IPK: <?= number_format($ipk, 2, ',', '.'); ?></p>

                <p>
                    Catatan Tambahan:
                    <?= $catatanTambahan === null ? "Belum ada" : bersihkan($catatanTambahan); ?>
                </p>

                <p>Saya Mahasiswa Program Studi Sistem Informasi.</p>


                <!-- TARGET BELAJAR -->

                <h3>Target Belajar (Perulangan For)</h3>

                <ol>

                    <?php
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
                                echo "Belum dipetakan.";
                        }

                        echo "</li>";
                    }
                    ?>

                </ol>


                <!-- PERULANGAN WHILE -->

                <h3>Semester (Perulangan While)</h3>

                <ol>

                    <?php
                    $nomorSemester = 1;

                    while ($nomorSemester <= 3) {
                        echo "<li>Semester " . $nomorSemester . "</li>";
                        $nomorSemester++;
                    }
                    ?>

                </ol>

            </article>

        </section>


        <!-- KONTAK -->

        <section id="contact">

            <h2>Kontak</h2>

            <p>
                Kunjungi
                <a
                    target="_blank"
                    rel="noopener noreferrer"
                    href="https://github.com/<?= bersihkan(PROFIL_GITHUB); ?>">

                    Profil GitHub Saya

                </a>.
            </p>


            <!-- FORMULIR PESAN -->

            <form
                id="contactForm"
                action="index.php"
                method="post"
                novalidate>

                <div class="form-group">

                    <label for="nama">Nama Lengkap</label>

                    <input
                        class="input-form"
                        type="text"
                        id="nama"
                        name="nama"
                        placeholder="Masukkan nama lengkap"
                        minlength="3"
                        maxlength="50"
                        required>

                </div>


                <div class="form-group">

                    <label for="email">Email</label>

                    <input
                        class="input-form"
                        type="email"
                        id="email"
                        name="email"
                        placeholder="nama@email.com"
                        required>

                </div>


                <div class="form-group">

                    <label for="semester">Semester</label>

                    <input
                        class="input-form"
                        type="number"
                        id="semester"
                        name="semester"
                        min="1"
                        max="14"
                        required>

                </div>


                <div class="form-group">

                    <label for="tanggal">Tanggal Kunjungan</label>

                    <input
                        class="input-form"
                        type="date"
                        id="tanggal"
                        name="tanggal"
                        required>

                </div>


                <div class="form-group">

                    <p>Jenis Pesan</p>

                    <input
                        type="radio"
                        id="pertanyaan"
                        name="jenis_pesan"
                        value="Pertanyaan"
                        required>

                    <label for="pertanyaan">Pertanyaan</label>

                    <input
                        type="radio"
                        id="saran"
                        name="jenis_pesan"
                        value="Saran">

                    <label for="saran">Saran</label>

                </div>


                <div class="form-group">

                    <p>Topik yang Diminati</p>

                    <input
                        type="checkbox"
                        id="minat-html"
                        name="minat[]"
                        value="HTML">

                    <label for="minat-html">HTML</label>

                    <input
                        type="checkbox"
                        id="minat-css"
                        name="minat[]"
                        value="CSS">

                    <label for="minat-css">CSS</label>

                </div>


                <div class="form-group">

                    <label for="prodi">Program Studi</label>

                    <select
                        class="input-form"
                        id="prodi"
                        name="prodi"
                        required>

                        <option value="">-- Pilih Program Studi --</option>

                        <option value="SI">Sistem Informasi</option>

                        <option value="TI">Teknik Informatika</option>

                    </select>

                </div>


                <div class="form-group">

                    <label for="pesan">Pesan</label>

                    <textarea
                        class="input-form"
                        id="pesan"
                        name="pesan"
                        maxlength="300"
                        placeholder="Tulis pesan Anda"
                        required></textarea>

                </div>


                <p id="formFeedback" role="alert"></p>

                <button type="submit">Kirim Pesan</button>

                <button type="reset">Batal</button>

            </form>


            <!-- ==================================
                 HASIL PESAN MUNCUL DI BAWAH FORM
            ================================== -->

            <?php if (isset($_SESSION["form_data"])): ?>

                <?php $data = $_SESSION["form_data"]; ?>

                <article class="submission-result" id="hasilPesan">

                    <h3>Pesan Berhasil Dikirim!</h3>

                    <span class="status-pesan">
                        ✓ Pesan berhasil disimpan
                    </span>

                    <p>
                        <strong>Nama Lengkap:</strong>
                        <?= bersihkan($data["nama"]); ?>
                    </p>

                    <p>
                        <strong>Email:</strong>
                        <?= bersihkan($data["email"]); ?>
                    </p>

                    <p>
                        <strong>Semester:</strong>
                        <?= bersihkan($data["semester"]); ?>
                    </p>

                    <p>
                        <strong>Tanggal Kunjungan:</strong>
                        <?= bersihkan($data["tanggal"]); ?>
                    </p>

                    <p>
                        <strong>Jenis Pesan:</strong>
                        <?= bersihkan($data["jenis_pesan"]); ?>
                    </p>

                    <p>
                        <strong>Program Studi:</strong>
                        <?= bersihkan($data["prodi"]); ?>
                    </p>

                    <p>
                        <strong>Topik yang Diminati:</strong>
                    </p>

                    <?php if (!empty($data["minat"])): ?>

                        <ul>
                            <?php foreach ($data["minat"] as $topik): ?>
                                <li><?= bersihkan($topik); ?></li>
                            <?php endforeach; ?>
                        </ul>

                    <?php else: ?>

                        <p>Belum ada topik yang dipilih.</p>

                    <?php endif; ?>

                    <p><strong>Isi Pesan:</strong></p>

                    <div class="pesan-diterima">
                        <?= bersihkan($data["pesan"]); ?>
                    </div>

                </article>

            <?php endif; ?>

        </section>

    </main>


    <!-- FOOTER -->

    <footer>

        <p>
            &copy; <?= date("Y"); ?>
            <?= bersihkan($namaMahasiswa); ?>
            [<?= bersihkan($nim); ?>]
        </p>

    </footer>


    <script src="script.js"></script>

</body>
</html>
