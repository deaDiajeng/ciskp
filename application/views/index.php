<?php
// defined('BASEPATH') OR exit('No direct script access allowed');
include 'layout/header.php';
include 'layout/navbar.php';
?>

<!-- Masthead-->
<section class="masthead">
    <div class="container">
        <div class="masthead-subheading">Membentuk Generasi Pecinta Al Quran</div>
        <div class="masthead-heading text-uppercase">Cerdas, Kreatif dan Mandiri</div>
    </div>
</section>

<!-- Guru -->
<section class="page-section bg-light" id="acara">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Acara</h2>
            <!-- <h3 class="section-subheading text-muted">Guru yang sudah bersertifikasi</h3> -->
        </div>
        <div class="row">
            <?php foreach ($guru as $teacher): ?>
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="assets/img/guru/<?php echo htmlspecialchars($teacher['foto']); ?>" alt="<?php echo htmlspecialchars($teacher['nama']); ?>" />
                    <h4><?php echo htmlspecialchars($teacher['nama']); ?></h4>
                    <p class="text-muted"><?php echo htmlspecialchars($teacher['jabatan']); ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <p class="large text-muted"></p>
            </div>
        </div>
    </div>
</section>

<!-- Hafalan-->
<section class="page-section" id="hafalan">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">HAFALAN</h2>
            <h3 class="section-subheading text-muted">Capaian Hafalan para santri sehari-hari</h3>
        </div>
        <ul class="timeline">
            <?php foreach ($pelajaran as $index => $lesson): ?>
            <li class="<?php echo $index % 2 === 1 ? 'timeline-inverted' : ''; ?>">
            <div class="timeline-image" style="background-image: url('assets/img/alur/<?php echo htmlspecialchars($lesson['gambar']); ?>');"></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4><?php echo htmlspecialchars($lesson['judul']); ?></h4>
                        <!-- <h4 class="subheading"><?php echo htmlspecialchars($lesson['judul']); ?></h4> -->
                    </div>
                    <div class="timeline-body">
                        <p class="text-muted"><?php echo htmlspecialchars($lesson['ket']); ?></p>
                    </div>
                </div>
            </li>
            <?php endforeach; ?>
            <!-- <li class="timeline-inverted">
            <div class="timeline-image">
                <h4 style="margin-top: 10px;">
                    Yukk
                    <br />
                    Bergabung
                    <br />
                    Bersama 
                    <br />
                    Kami
                </h4>
            </div>
            </li> -->
        </ul>
    </div>
</section>

<!-- Gallery -->
<section class="page-section bg-light" id="galery">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Galeri</h2>
            <h3 class="section-subheading text-muted">Dokumentasi kegiatan belajar sehari-hari</h3>
        </div>
        <div class="row">
            <?php if (!empty($galeri)) : ?>
                <?php foreach ($galeri as $item): ?>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal">
                            <div class="portfolio-img-wrapper">
                                <img class="img-fluid equal-img" src="public/img/gallery/<?php echo htmlspecialchars($item['gambar']); ?>" alt="<?php echo htmlspecialchars($item['kegiatan']); ?>" />
                            </div>
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading"><?php echo htmlspecialchars($item['kegiatan']); ?></div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p class="text-muted">Belum ada gambar di galeri.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php
include 'layout/footer.php';
?>