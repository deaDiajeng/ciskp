<?php
// defined('BASEPATH') OR exit('No direct script access allowed');
include 'layout/header.php';
include 'layout/navbar.php';
?>

<!-- Masthead-->
<section class="masthead">
    <div class="container">
        <div class="masthead-subheading">Selamat datang di</div>
        <div class="masthead-heading text-uppercase">RUMAH QURAN INSAN TODA</div>
    </div>
</section>

<div class="container py-5">
        <div class="row py-3">
            <div class="col-lg-7 mt-5 mb-4">
                <h1>RUMAH QUR'AN INSAN TODA</h1>
                <h4>Menjadi Sekolah yang menyenangkan bagi siswa</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
                <p>
                    <a href="daftar.php" class="btn btn-dark">DAFTAR</a>
                    <!-- <button type="button" class="btn btn-outline-dark">Profil Sekolah</button> -->
                </p>
            </div>
            <div class="col-lg-5 mb-4">
                <img src="https://naevaschool.naevaweb.my.id/userfiles/uploads/bg-edukasi-246.jpg" class="d-block w-100 rounded" alt="...">
            </div>
        </div>
    </div>
    <!-- Capaian Hafalan  -->
    <?php if (!empty($hapalan)) : ?>
    <div id="capaianCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-inner">
            <?php
            $chunked = array_chunk($hapalan, 3); // Bagi isi jadi 3 item per slide
            foreach ($chunked as $index => $group) : ?>
                <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                    <div class="row">
                        <?php foreach ($group as $item): ?>
                            <div class="col-lg-4 col-sm-6 mb-4">
                                <div class="bg-light border text-center p-4 rounded">
                                    <div class="pb-3"><i class="fas fa-award fa-2x"></i></div>
                                    <h4 class="text-uppercase"><?= htmlspecialchars($item['nama']); ?></h4>
                                    <p class="text-muted"><?= htmlspecialchars($item['capaian']); ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Tombol prev/next -->
        <button class="carousel-control-prev" type="button" data-bs-target="#capaianCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#capaianCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
<?php else : ?>
    <div class="col-12 text-center py-5">
        <i class="fas fa-book-open fa-3x text-muted mb-3"></i>
        <p class="text-muted">Tidak ada capaian saat ini.</p>
    </div>
<?php endif; ?>


<!-- Section: Agenda --> 
<section class="page-section bg-light <?= isset($menu_status['agenda']) && !$menu_status['agenda'] ? 'd-none' : '' ?>" id="agenda">
    <div class="container pb-5">
        <div class="row pb-3 align-items-top">
            <!-- gallery sekolah  -->
        <section class="page-section bg-light <?= isset($menu_status['gallery']) && !$menu_status['gallery'] ? 'd-none' : '' ?>" id="galery">
    <div class="container">
        <div class="row">
            <!-- Kolom GALLERY SEKOLAH dengan Carousel -->
            <div class="col-lg-5 mb-4">
                <div class="p-3 bg-dark text-white rounded shadow">
                    <h4 class="text-uppercase mb-3">Gallery Sekolah</h4>

                    <?php if (!empty($gallery)) : ?>
                        <div id="carouselGaleri" class="carousel slide carousel-fade" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <?php foreach ($gallery as $index => $item): ?>
                                    <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                                        <img class="d-block w-100 rounded"
                                             src="<?= base_url('public/img/gallery/' . htmlspecialchars($item['image'])); ?>"
                                             alt="<?= htmlspecialchars($item['event']); ?>">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="text-center py-5">
                            <i class="fas fa-images fa-3x text-muted mb-3"></i>
                            <p class="text-muted">Tidak ada gambar di galeri.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <!-- kegiatan sekolah  -->
            <div class="col-xxl-7 col-lg-6 mb-3 mb-lg-4">
                <div class="h5 text-uppercase">Kegiatan Sekolah</div>
                <div class="d-flex py-3 border-bottom">
                    <div class="row">
                        <?php if (!empty($agenda)) : ?>
                            <?php foreach ($agenda as $event): ?>
                                <div class="d-flex align-items-center mb-4">
                                    <!-- Gambar -->
                                    <img class="rounded" alt="..." width="100"
                                        src="<?= base_url('uploads/agenda/' . htmlspecialchars($event->image ?? 'default.jpg')); ?>" 
                                        alt="<?= htmlspecialchars($event->title ?? 'Tanpa Judul'); ?>" />
                                    <!-- Teks di sebelah kanan gambar -->
                                    <div class="ms-3">
                                        <h4 class="mb-1"><?= htmlspecialchars($event->title ?? 'Tanpa Judul'); ?></h4>
                                        <p class="small text-secondary mb-0"><?= htmlspecialchars($event->date ?? 'Tanggal tidak tersedia'); ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?> 
                            <div class="col-12 text-center py-5">
                                <i class="fas fa-calendar-alt fa-3x text-muted mb-3"></i>
                                <p class="text-muted">Tidak ada acara yang tersedia saat ini.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- <div class="pt-3">
                    <button type="button" class="btn btn-dark btn-sm">Selengkapnya</button>
                </div> -->
            </div>
        </div>
    </div>
    <!-- <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Acara</h2>
        </div>
        <div class="row">
            <?php if (!empty($agenda)) : ?>
                <?php foreach ($agenda as $event): ?>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" 
                             src="<?= base_url('uploads/agenda/' . htmlspecialchars($event->image ?? 'default.jpg')); ?>" 
                             alt="<?= htmlspecialchars($event->title ?? 'Tanpa Judul'); ?>" />
                        <h4><?= htmlspecialchars($event->title ?? 'Tanpa Judul'); ?></h4>
                        <p class="text-muted"><?= htmlspecialchars($event->date ?? 'Tanggal tidak tersedia'); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="col-12 text-center py-5">
                    <i class="fas fa-calendar-alt fa-3x text-muted mb-3"></i>
                    <p class="text-muted">Tidak ada acara yang tersedia saat ini.</p>
                </div>
            <?php endif; ?>
        </div>
    </div> -->
</section>


<!-- Section: Capaian -->
<!-- <section class="page-section <?= isset($menu_status['achievement']) && !$menu_status['achievement'] ? 'd-none' : '' ?>" id="achievement">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Capaian</h2>
        </div>
        <div class="row">
            <?php if (!empty($achievement)) : ?>
                <?php foreach ($achievement as $item): ?>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <h4><?= htmlspecialchars($item['nama']); ?></h4>
                    <p class="text-muted"><?= htmlspecialchars($item['achievement']); ?></p>
                </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="col-12 text-center py-5">
                    <i class="fas fa-book-open fa-3x text-muted mb-3"></i>
                    <p class="text-muted">Tidak ada achievement saat ini.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section> -->

<!-- Section: Gallery -->
<!-- <section class="page-section bg-light <?= isset($menu_status['galery']) && !$menu_status['galery'] ? 'd-none' : '' ?>" id="galery">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Galeri</h2>
        </div>
        <div class="row">
            <?php if (!empty($galery)) : ?>
                <?php foreach ($galery as $item): ?>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <img class="img-fluid" src="<?= base_url('public/img/gallery/' . htmlspecialchars($item['gambar'])); ?>" alt="<?= htmlspecialchars($item['kegiatan']); ?>">
                    <h4><?= htmlspecialchars($item['kegiatan']); ?></h4>
                </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="col-12 text-center py-5">
                    <i class="fas fa-images fa-3x text-muted mb-3"></i>
                    <p class="text-muted">Tidak ada gambar di galeri.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section> -->

    <div class="py-2">
        <div class="container text-center bg-success text-white py-5">
            <div class="fs-2 mb-3">Segera Daftar!</div>
                <p>Penerimaan Peserta Didik Baru Rumah Qur'an Insan Toda</p>
            <div class="pt-2">
                <a href="https://wa.me/6283819937178" target="_blank" class="btn btn-outline-light me-2">Info Lebih Lanjut</a>
                <a href="<?= site_url('daftar') ?>" class="btn btn-outline-light">Daftar Sekarang</a>
            </div>
        </div>
    </div>
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row">
            <!-- Peta Google Maps -->
            <div class="col-md-6 mb-4">
                <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.2894251935327!2d106.78210200000001!3d-6.610915200000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5c250150173%3A0x3f6474c67e648216!2sSMKIT%20Insan%20Toda!5e0!3m2!1sen!2sid!4v1748321097561!5m2!1sen!2sid"
                width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                class="rounded shadow-sm">
                </iframe>
            </div>
            <div class="col-lg-6 mb-4">
                <img src="https://naevaschool.naevaweb.my.id/userfiles/uploads/bg-edukasi-246.jpg" class="d-block w-100 rounded" alt="...">
            
            <class=col-md-6 d-flex flex-column justify-content-center>
                <h2 class="fw-bold mt-3 text-center">RUMAH QUR'AN INSAN TODA</h2>
                <p class="text-muted mb-">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

            <div class="d-flex gap-3">
                <!-- <a href="https://maps.app.goo.gl/ZDRvYRD6XXpXP6AZ8" target="_blank" class="btn btn-dark">
                    <i class="fas fa-map-marker-alt"></i>
                </a> -->
                <a href="https://wa.me/6283819937178" target="_blank" class="btn btn-success">
                    <i class="fab fa-whatsapp"></i>
                </a>
                <a href="https://instagram.com/diajenglarasati_272" target="_blank" class="btn btn-danger">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<?php
include 'layout/footer.php';
?>