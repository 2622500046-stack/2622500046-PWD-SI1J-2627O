<?php
session_start();

// ==========================================
// WEBSITE TENTANG SAYA
// Nama  : Muhammad Ramadhani
// NIM   : 2622500046
// Prodi : Sistem Informasi
// ==========================================

// DATA DIRI
$nim = "2622500046";
$namaMahasiswa = "Muhammad Ramadhani";
$programStudi = "SI";
$namaProdi = "Sistem Informasi";
$tahunAkademik = "2026/2027";
$semester = 1;

// HOBI SAYA
$hobiSaya = [
    [
        "nama" => "Bermain Sepak Bola",
        "deskripsi" => "Saya senang bermain sepak bola karena olahraga ini mengajarkan kerja sama, kekompakan, dan sportivitas."
    ],
    [
        "nama" => "Bermain Futsal",
        "deskripsi" => "Futsal merupakan salah satu kegiatan favorit saya untuk mengisi waktu luang sekaligus menjaga kebugaran tubuh."
    ],
    [
        "nama" => "Mendengarkan Musik",
        "deskripsi" => "Saya suka mendengarkan musik untuk menghibur diri dan membuat suasana hati menjadi lebih baik."
    ],
    [
        "nama" => "Belajar Teknologi",
        "deskripsi" => "Saya tertarik mempelajari teknologi, khususnya komputer, website, dan dunia digital."
    ]
];

// TUJUAN DAN CITA-CITA
$tujuanSaya = [
    "Menyelesaikan pendidikan dengan hasil yang baik.",
    "Menambah ilmu dan pengalaman di bidang teknologi.",
    "Menjadi pribadi yang mandiri dan bertanggung jawab.",
    "Membanggakan kedua orang tua.",
    "Meraih cita-cita dan masa depan yang lebih baik."
];

// FUNGSI KEAMANAN OUTPUT
function e($data) {
    return htmlspecialchars((string)$data, ENT_QUOTES, 'UTF-8');
}

// ==========================================
// FITUR INPUT DAN TAMPILAN PESAN
// ==========================================

if (!isset($_SESSION['pesan_pengunjung'])) {
    $_SESSION['pesan_pengunjung'] = [];
}

// PROSES KETIKA FORM DIKIRIM
if (
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    ($_POST['aksi'] ?? '') === 'kirim_pesan'
) {
    $namaPengirim = trim($_POST['nama'] ?? '');
    $emailPengirim = trim($_POST['email'] ?? '');
    $isiPesan = trim($_POST['pesan'] ?? '');

    if ($namaPengirim === '' || mb_strlen($namaPengirim) < 2) {

        $_SESSION['flash_pesan'] = [
            'jenis' => 'error',
            'teks' => 'Nama wajib diisi minimal 2 karakter.'
        ];

    } elseif (!filter_var($emailPengirim, FILTER_VALIDATE_EMAIL)) {

        $_SESSION['flash_pesan'] = [
            'jenis' => 'error',
            'teks' => 'Format email belum benar.'
        ];

    } elseif ($isiPesan === '' || mb_strlen($isiPesan) > 300) {

        $_SESSION['flash_pesan'] = [
            'jenis' => 'error',
            'teks' => 'Pesan wajib diisi dan maksimal 300 karakter.'
        ];

    } else {

        // SIMPAN PESAN
        array_unshift($_SESSION['pesan_pengunjung'], [
            'nama' => $namaPengirim,
            'email' => $emailPengirim,
            'pesan' => $isiPesan,
            'tanggal' => date('d-m-Y H:i')
        ]);

        // MAKSIMAL 20 PESAN
        $_SESSION['pesan_pengunjung'] =
            array_slice($_SESSION['pesan_pengunjung'], 0, 20);

        $_SESSION['flash_pesan'] = [
            'jenis' => 'success',
            'teks' => 'Pesan berhasil dikirim. Terima kasih sudah menghubungi saya!'
        ];
    }

    header('Location: ' . strtok($_SERVER['REQUEST_URI'], '?') . '#kontak');
    exit;
}

$flashPesan = $_SESSION['flash_pesan'] ?? null;
unset($_SESSION['flash_pesan']);

$daftarPesan = $_SESSION['pesan_pengunjung'];
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tentang Saya | <?php echo e($namaMahasiswa); ?></title>

    <link rel="stylesheet" href="style.css">

    <style>
        :root {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            color: #243247;
            line-height: 1.7;
        }

        img {
            max-width: 100%;
        }

        .header {
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 18px rgba(15, 35, 60, .10);
        }

        .container {
            width: min(1120px, calc(100% - 40px));
            margin-inline: auto;
        }

        .section {
            padding: 82px 0;
        }

        .section-heading {
            text-align: center;
            margin-bottom: 42px;
        }

        .section-heading h2 {
            margin: 8px 0;
            color: #142b49;
        }

        .section-heading > p:last-child {
            color: #68778b;
        }

        /* KONTAK */
        .contact-container {
            display: grid;
            grid-template-columns: minmax(0, 1.15fr) minmax(280px, .85fr);
            gap: 28px;
            align-items: start;
        }

        .contact-form,
        .contact-info,
        .message-board {
            background: #fff;
            border: 1px solid #e5eaf1;
            border-radius: 18px;
            padding: 28px;
            box-shadow: 0 12px 35px rgba(23, 43, 77, .07);
        }

        .form-group {
            margin-bottom: 19px;
        }

        .form-group label {
            display: block;
            margin-bottom: 7px;
            font-weight: 700;
            color: #243b59;
        }

        .form-group input,
        .form-group textarea {
            box-sizing: border-box;
            width: 100%;
            border: 1px solid #d7dfeb;
            border-radius: 10px;
            padding: 13px 14px;
            font: inherit;
            color: #243247;
            background: #fbfcfe;
            outline: none;
            transition: .2s;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, .12);
            background: #fff;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 130px;
        }

        #charCount {
            display: block;
            text-align: right;
            color: #77859a;
            margin-top: 5px;
        }

        .contact-form .btn-primary {
            border: 0;
            cursor: pointer;
            font: inherit;
        }

        #formFeedback {
            margin: 14px 0 0;
        }

        /* DAFTAR PESAN */
        .message-board {
            grid-column: 1 / -1;
            margin-top: 2px;
        }

        .message-board h3 {
            margin: 0 0 18px;
            color: #142b49;
        }

        .message-item {
            padding: 18px 0;
            border-top: 1px solid #e9edf3;
        }

        .message-item:first-of-type {
            border-top: 0;
        }

        .message-head {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 8px;
            margin-bottom: 7px;
        }

        .message-head strong {
            color: #1d3b62;
        }

        .message-meta {
            color: #8793a4;
            font-size: .85rem;
        }

        .message-body {
            margin: 0;
            white-space: pre-wrap;
            overflow-wrap: anywhere;
            color: #46566c;
        }

        .empty-messages {
            color: #7a8798;
            background: #f7f9fc;
            border-radius: 12px;
            padding: 18px;
        }

        .form-alert {
            padding: 12px 15px;
            border-radius: 10px;
            margin: 0 0 18px;
        }

        .form-alert.success {
            color: #166534;
            background: #dcfce7;
        }

        .form-alert.error {
            color: #991b1b;
            background: #fee2e2;
        }

        .contact-detail {
            overflow-wrap: anywhere;
        }

        .back-to-top {
            cursor: pointer;
        }

        /* RESPONSIVE */
        @media (max-width: 760px) {
            .container {
                width: min(100% - 28px, 600px);
            }

            .section {
                padding: 58px 0;
            }

            .contact-container {
                grid-template-columns: 1fr;
            }

            .contact-form,
            .contact-info,
            .message-board {
                padding: 21px;
            }

            .message-board {
                grid-column: auto;
            }

            .hero-content {
                gap: 35px;
            }
        }
    </style>

</head>

<body>

    <!-- NAVBAR -->
    <header class="header">
        <div class="container navbar">

            <div class="logo">
                <h2>Ramadhani<span>.</span></h2>
            </div>

            <button class="nav-toggle"
                    id="navToggle"
                    aria-label="Buka navigasi"
                    aria-expanded="false">
                ☰
            </button>

            <nav class="nav-menu" id="navMenu">
                <a href="#beranda">Beranda</a>
                <a href="#tentang">Tentang Saya</a>
                <a href="#hobi">Hobi Saya</a>
                <a href="#perjalanan">Perjalanan</a>
                <a href="#cita-cita">Cita-Cita</a>
                <a href="#kontak">Kontak</a>
            </nav>

        </div>
    </header>


    <!-- BERANDA -->
    <section class="hero" id="beranda">

        <div class="container hero-content">

            <div class="hero-text">

                <p class="subtitle">HALO, SELAMAT DATANG!</p>

                <h1>
                    Hai, Saya
                    <span><?php echo e($namaMahasiswa); ?></span>
                </h1>

                <h2>Mahasiswa <?php echo e($namaProdi); ?></h2>

                <p class="hero-description">
                    Selamat datang di website pribadi saya.
                    Di sini saya ingin berbagi cerita tentang diri saya,
                    hobi, pengalaman, dan cita-cita yang ingin saya capai.
                </p>

                <div class="hero-buttons">

                    <a href="#tentang" class="btn-primary">
                        Tentang Saya
                    </a>

                    <a href="#hobi" class="btn-secondary">
                        Lihat Hobi
                    </a>

                </div>

            </div>


            <!-- FOTO PROFIL -->
            <div class="hero-image">

                <div class="image-decoration"></div>

                <img
                    src="img/foto-profil.jpeg"
                    alt="Foto Profil Muhammad Ramadhani"
                    class="profile-image"
                >

                <div class="image-caption">
                    <h3><?php echo e($namaMahasiswa); ?></h3>
                    <p>Mahasiswa Sistem Informasi</p>
                </div>

            </div>

        </div>

    </section>


    <!-- TENTANG SAYA -->
    <section class="section" id="tentang">

        <div class="container">

            <div class="section-heading">
                <p class="subtitle">PERKENALAN</p>
                <h2>Tentang Saya</h2>
                <p>Mengenal lebih dekat siapa diri saya.</p>
            </div>

            <div class="about-content">

                <div class="about-text">

                    <h3>Perkenalkan, Saya <?php echo e($namaMahasiswa); ?></h3>

                    <p>
                        Perkenalkan, nama saya
                        <strong><?php echo e($namaMahasiswa); ?></strong>.
                        Saya merupakan mahasiswa Program Studi
                        <strong><?php echo e($namaProdi); ?></strong>.
                    </p>

                    <p>
                        Saya adalah seseorang yang senang mencoba hal baru,
                        belajar dari pengalaman, dan terus berusaha
                        mengembangkan kemampuan diri.
                    </p>

                    <p>
                        Dalam kehidupan sehari-hari, saya memiliki beberapa
                        hobi yang saya sukai, terutama bermain sepak bola
                        dan futsal. Kedua olahraga tersebut menjadi kegiatan
                        favorit saya karena menyenangkan dan membuat saya
                        lebih semangat.
                    </p>

                    <p>
                        Saya percaya bahwa setiap orang memiliki kesempatan
                        untuk berkembang selama mau belajar, berusaha,
                        dan tidak mudah menyerah.
                    </p>

                </div>


                <!-- IDENTITAS -->
                <div class="identity-card">

                    <h3>Identitas Diri</h3>

                    <div class="identity-item">
                        <span>Nama Lengkap</span>
                        <strong><?php echo e($namaMahasiswa); ?></strong>
                    </div>

                    <div class="identity-item">
                        <span>NIM</span>
                        <strong><?php echo e($nim); ?></strong>
                    </div>

                    <div class="identity-item">
                        <span>Program Studi</span>
                        <strong><?php echo e($namaProdi); ?></strong>
                    </div>

                    <div class="identity-item">
                        <span>Kode Jurusan</span>
                        <strong><?php echo e($programStudi); ?></strong>
                    </div>

                    <div class="identity-item">
                        <span>Tahun Akademik</span>
                        <strong><?php echo e($tahunAkademik); ?></strong>
                    </div>

                    <div class="identity-item">
                        <span>Semester</span>
                        <strong><?php echo e($semester); ?></strong>
                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- HOBI SAYA -->
    <section class="section hobby-section" id="hobi">

        <div class="container">

            <div class="section-heading">
                <p class="subtitle">KEGIATAN FAVORIT</p>
                <h2>Hobi Saya</h2>
                <p>Beberapa kegiatan yang saya sukai.</p>
            </div>

            <div class="hobby-grid">

                <?php foreach ($hobiSaya as $index => $hobi): ?>

                    <div class="hobby-card">

                        <div class="hobby-number">
                            0<?php echo $index + 1; ?>
                        </div>

                        <h3>
                            <?php echo e($hobi["nama"]); ?>
                        </h3>

                        <p>
                            <?php echo e($hobi["deskripsi"]); ?>
                        </p>

                    </div>

                <?php endforeach; ?>

            </div>

        </div>

    </section>


    <!-- PERJALANAN -->
    <section class="section" id="perjalanan">

        <div class="container">

            <div class="section-heading">
                <p class="subtitle">CERITA PERJALANAN</p>
                <h2>Perjalanan Saya</h2>
                <p>Setiap langkah merupakan bagian dari proses belajar.</p>
            </div>

            <div class="timeline">

                <div class="timeline-item">

                    <div class="timeline-dot"></div>

                    <div class="timeline-content">
                        <h3>Masa Sekolah</h3>

                        <p>
                            Masa sekolah merupakan bagian penting dalam
                            perjalanan hidup saya. Di sana saya mendapatkan
                            banyak pengalaman, ilmu pengetahuan, dan
                            teman-teman baru.
                        </p>
                    </div>

                </div>


                <div class="timeline-item">

                    <div class="timeline-dot"></div>

                    <div class="timeline-content">
                        <h3>Menjadi Mahasiswa</h3>

                        <p>
                            Saat ini saya sedang menjalani pendidikan
                            sebagai mahasiswa Program Studi Sistem Informasi.
                            Saya ingin terus belajar dan meningkatkan
                            kemampuan diri.
                        </p>
                    </div>

                </div>


                <div class="timeline-item">

                    <div class="timeline-dot"></div>

                    <div class="timeline-content">
                        <h3>Mengembangkan Kemampuan</h3>

                        <p>
                            Saya ingin mengembangkan kemampuan dalam bidang
                            teknologi, komputer, dan pemrograman agar
                            memiliki bekal untuk masa depan.
                        </p>
                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- CITA-CITA -->
    <section class="section dream-section" id="cita-cita">

        <div class="container">

            <div class="section-heading">
                <p class="subtitle">MASA DEPAN</p>
                <h2>Cita-Cita dan Harapan</h2>
                <p>Hal-hal yang ingin saya capai di masa depan.</p>
            </div>

            <div class="dream-card">

                <h3>Impian Saya</h3>

                <p>
                    Saya ingin menjadi pribadi yang sukses,
                    memiliki ilmu yang bermanfaat, dan mampu
                    membanggakan keluarga serta orang-orang
                    yang telah mendukung saya.
                </p>

                <ul class="dream-list">

                    <?php foreach ($tujuanSaya as $tujuan): ?>

                        <li>
                            <span>✓</span>
                            <?php echo e($tujuan); ?>
                        </li>

                    <?php endforeach; ?>

                </ul>

            </div>

        </div>

    </section>


    <!-- MOTIVASI -->
    <section class="motivation-section">

        <div class="container">

            <div class="motivation-content">

                <h2>Motivasi Hidup</h2>

                <p>
                    "Jangan takut untuk memulai sesuatu yang baru.
                    Setiap proses membutuhkan waktu, usaha,
                    dan kesabaran untuk mencapai keberhasilan."
                </p>

                <span>— Muhammad Ramadhani</span>

            </div>

        </div>

    </section>


    <!-- KONTAK -->
    <section class="section" id="kontak">

        <div class="container">

            <div class="section-heading">
                <p class="subtitle">HUBUNGI SAYA</p>
                <h2>Kontak Saya</h2>
                <p>Silakan kirim pesan melalui formulir berikut.</p>
            </div>


            <div class="contact-container">

                <!-- FORM INPUT PESAN -->
                <form id="contactForm"
                      class="contact-form"
                      method="POST"
                      action="#kontak">

                    <input type="hidden"
                           name="aksi"
                           value="kirim_pesan">

                    <div class="form-group">

                        <label for="nama">Nama</label>

                        <input
                            type="text"
                            id="nama"
                            name="nama"
                            placeholder="Masukkan nama Anda"
                            required
                            minlength="2"
                        >

                    </div>


                    <div class="form-group">

                        <label for="email">Email</label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="Masukkan email Anda"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label for="pesan">Pesan</label>

                        <textarea
                            id="pesan"
                            name="pesan"
                            rows="5"
                            maxlength="300"
                            placeholder="Tuliskan pesan Anda..."
                            required
                        ></textarea>

                        <small id="charCount">
                            0/300 karakter
                        </small>

                    </div>


                    <button type="submit" class="btn-primary">
                        Kirim Pesan
                    </button>

                    <!-- NOTIFIKASI -->
                    <?php if ($flashPesan): ?>

                        <div class="form-alert <?php echo e($flashPesan['jenis']); ?>"
                             role="status">

                            <?php echo e($flashPesan['teks']); ?>

                        </div>

                    <?php endif; ?>

                </form>


                <!-- DAFTAR PESAN YANG MASUK -->
                <div class="message-board" id="daftar-pesan">

                    <h3>Pesan yang Masuk</h3>

                    <?php if (count($daftarPesan) > 0): ?>

                        <?php foreach ($daftarPesan as $itemPesan): ?>

                            <article class="message-item">

                                <div class="message-head">

                                    <strong>
                                        <?php echo e($itemPesan['nama']); ?>
                                    </strong>

                                    <span class="message-meta">
                                        <?php echo e($itemPesan['tanggal']); ?>
                                    </span>

                                </div>

                                <div class="message-meta">
                                    <?php echo e($itemPesan['email']); ?>
                                </div>

                                <p class="message-body">
                                    <?php echo e($itemPesan['pesan']); ?>
                                </p>

                            </article>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <p class="empty-messages">
                            Belum ada pesan. Jadilah orang pertama yang mengirim pesan!
                        </p>

                    <?php endif; ?>

                </div>


                <!-- INFORMASI SAYA -->
                <div class="contact-info">

                    <h3>Informasi Saya</h3>

                    <p>
                        Terima kasih sudah mengunjungi website pribadi saya.
                        Semoga informasi yang saya bagikan dapat memberikan
                        gambaran tentang diri saya.
                    </p>

                    <div class="contact-detail">
                        <strong>Nama:</strong>
                        <span><?php echo e($namaMahasiswa); ?></span>
                    </div>

                    <div class="contact-detail">
                        <strong>NIM:</strong>
                        <span><?php echo e($nim); ?></span>
                    </div>

                    <div class="contact-detail">
                        <strong>Jurusan:</strong>
                        <span><?php echo e($namaProdi); ?></span>
                    </div>

                    <div class="contact-detail">

                        <strong>GitHub:</strong>

                        <a href="https://github.com/2622500046-stack"
                           target="_blank"
                           rel="noopener noreferrer">

                            2622500046-stack

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- FOOTER -->
    <footer class="footer">

        <div class="container">

            <h3><?php echo e($namaMahasiswa); ?></h3>

            <p>
                Website pribadi tentang perjalanan,
                hobi, dan cita-cita saya.
            </p>

            <p class="copyright">

                &copy; <?php echo date("Y"); ?>

                <?php echo e($namaMahasiswa); ?>.

                Semua Hak Dilindungi.

            </p>

        </div>

    </footer>


    <!-- TOMBOL KEMBALI KE ATAS -->
    <button id="backToTop"
            class="back-to-top"
            aria-label="Kembali ke atas">

        ↑

    </button>


    <!-- JAVASCRIPT -->
    <script>

        // MENU NAVIGASI
        const navToggle = document.getElementById('navToggle');
        const navMenu = document.getElementById('navMenu');

        if (navToggle && navMenu) {

            navToggle.addEventListener('click', () => {

                const terbuka = navMenu.classList.toggle('nav-open');

                navToggle.setAttribute(
                    'aria-expanded',
                    String(terbuka)
                );

                navToggle.setAttribute(
                    'aria-label',
                    terbuka ? 'Tutup navigasi' : 'Buka navigasi'
                );

            });

            navMenu.querySelectorAll('a').forEach(link => {

                link.addEventListener('click', () => {

                    navMenu.classList.remove('nav-open');

                    navToggle.setAttribute('aria-expanded', 'false');

                    navToggle.setAttribute(
                        'aria-label',
                        'Buka navigasi'
                    );

                });

            });

        }


        // PENGHITUNG KARAKTER PESAN
        const inputPesan = document.getElementById('pesan');

        const charCount = document.getElementById('charCount');

        function hitungKarakter() {

            if (inputPesan && charCount) {

                charCount.textContent =
                    inputPesan.value.length + '/300 karakter';

            }

        }

        if (inputPesan) {

            inputPesan.addEventListener('input', hitungKarakter);

            hitungKarakter();

        }


        // TOMBOL KEMBALI KE ATAS
        const backToTop = document.getElementById('backToTop');

        if (backToTop) {

            backToTop.addEventListener('click', () => {

                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });

            });

        }

    </script>

</body>
</html>