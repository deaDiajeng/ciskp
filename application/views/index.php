<style>
    .carousel-inner .carousel-item img {
        height: 400px;
        /* sesuaikan tinggi yang kamu mau */
        object-fit: cover;
        width: 100%;
    }
</style>

<?php
defined('BASEPATH') or exit('No direct script access allowed');
include 'layout/header.php';
include 'layout/navbar.php';
?>

<!-- Masthead -->
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
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</p>
            <p>
                <a href="daftar.php" class="btn btn-dark">DAFTAR</a>
            </p>
        </div>
        <div class="col-lg-5 mb-4">
            <img src="https://naevaschool.naevaweb.my.id/userfiles/uploads/bg-edukasi-246.jpg" class="d-block w-100 rounded" alt="...">
        </div>
    </div>
</div>

<!-- Capaian -->
<?php if (!empty($menu_status['capaian'])): ?>
    <section class="py-5 bg-light">
        <div class="container">
            <h3 class="text-uppercase text-center mb-5">Capaian Siswa</h3>
            <?php if (!empty($capaian)) : ?>
                <div id="capaianCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php foreach (array_chunk($capaian, 3) as $index => $group): ?>
                            <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                                <div class="row justify-content-center">
                                    <?php foreach ($group as $item): ?>
                                        <div class="col-md-4 mb-4">
                                            <div class="card border-0 shadow-sm h-100 text-center">
                                                <?php if (!empty($item->image)): ?>
                                                    <img src="<?= base_url('uploads/capaian/' . htmlspecialchars($item->image)) ?>"
                                                        class="card-img-top img-fluid"
                                                        style="height: 180px; object-fit: cover;"
                                                        alt="<?= htmlspecialchars($item->name ?? '-') ?>">
                                                <?php endif; ?>
                                                <div class="card-body">
                                                    <h5 class="card-title text-uppercase"><?= htmlspecialchars($item->name ?? '-') ?></h5>
                                                    <p class="card-text text-muted"><?= htmlspecialchars($item->achievement ?? '-') ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <a class="carousel-control-prev" href="#capaianCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                        <span class="sr-only">Sebelumnya</span>
                    </a>
                    <a class="carousel-control-next" href="#capaianCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                        <span class="sr-only">Berikutnya</span>
                    </a>
                </div>
            <?php else: ?>
                <p class="text-center text-muted">Belum ada capaian ditampilkan.</p>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<!-- Agenda -->
<?php if (!empty($menu_status['agenda'])): ?>
    <section class="py-5" id="agenda">
        <div class="container">
            <h3 class="text-uppercase text-center mb-5">Agenda / Kegiatan Sekolah</h3>
            <?php if (!empty($agenda)) : ?>
                <div class="row">
                    <?php foreach ($agenda as $event): ?>
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card border-0 shadow-sm h-100">
                                <img src="<?= base_url('uploads/agenda/' . htmlspecialchars($event->image ?? 'default.jpg')); ?>"
                                     class="card-img-top img-fluid"
                                     style="height: 180px; object-fit: cover;"
                                     alt="<?= htmlspecialchars($event->title ?? '-') ?>">
                                <div class="card-body">
                                    <h5 class="card-title text-primary"><?= htmlspecialchars($event->title ?? '-') ?></h5>
                                    <p class="card-text text-muted mb-0"><i class="fas fa-calendar-alt mr-2"></i><?= htmlspecialchars($event->date ?? '-') ?></p>
                                </div>
                                <button class="btn btn-sm btn-outline-primary mx-3 mb-3" data-toggle="modal" data-target="#modalAgenda<?= $event->id_agenda ?>">
                                    Lihat Detail
                                </button>
                            </div>
                        </div>

                        <!-- Modal untuk setiap agenda -->
                        <div class="modal fade" id="modalAgenda<?= $event->id_agenda ?>" tabindex="-1" role="dialog" aria-labelledby="agendaLabel<?= $event->id_agenda ?>" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="agendaLabel<?= $event->id_agenda ?>"><?= htmlspecialchars($event->title) ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="text-muted"><i class="fas fa-calendar-alt mr-2"></i><?= htmlspecialchars($event->date) ?></p>
                                        <img src="<?= base_url('uploads/agenda/' . $event->image); ?>" class="img-fluid mb-3 rounded" alt="<?= $event->title ?>">
                                        <p><?= nl2br(htmlspecialchars($event->keterangan)) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p class="text-center text-muted">Belum ada agenda tersedia.</p>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<!-- Gallery -->
<?php if (!empty($menu_status['gallery'])): ?>
    <section class="py-5 bg-light" id="galery">
        <div class="container">
            <h3 class="text-uppercase text-center mb-5">Galeri Sekolah</h3>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <?php if (!empty($gallery)) : ?>
                        <div id="carouselGaleri" class="carousel slide carousel-fade" data-ride="carousel">
                            <div class="carousel-inner">
                                <?php foreach ($gallery as $index => $item): ?>
                                    <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                                        <img src="<?= base_url('uploads/galeri/' . htmlspecialchars($item->image)); ?>"
                                            class="d-block w-100 rounded"
                                            style="height: 400px; object-fit: cover;"
                                            alt="<?= htmlspecialchars($item->event); ?>">
                                        <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded px-3 py-2">
                                            <h5><?= htmlspecialchars($item->event); ?></h5>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <a class="carousel-control-prev" href="#carouselGaleri" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                                <span class="sr-only">Sebelumnya</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselGaleri" role="button" data-slide="next">
                                <span class="carousel-control-next-icon"></span>
                                <span class="sr-only">Berikutnya</span>
                            </a>
                        </div>
                    <?php else : ?>
                        <p class="text-center text-muted">Tidak ada gambar di galeri.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<!-- CTA Pendaftaran -->
<section class="py-5 bg-success text-white text-center">
    <div class="container">
        <h3 class="mb-3">Segera Daftar!</h3>
        <p>Penerimaan Peserta Didik Baru Rumah Qur'an Insan Toda</p>
        <a href="https://wa.me/6283819937178" target="_blank" class="btn btn-outline-light me-2">Info WhatsApp</a>
        <a href="<?= site_url('daftar') ?>" class="btn btn-outline-light">Daftar Sekarang</a>
    </div>
</section>

<!-- Maps -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 mb-4">
                <iframe class="w-100 rounded shadow-sm" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.2894251935327!2d106.78210200000001!3d-6.610915200000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5c250150173%3A0x3f6474c67e648216!2sSMKIT%20Insan%20Toda!5e0!3m2!1sen!2sid!4v1748321097561!5m2!1sen!2sid">
                </iframe>
            </div>
            <div class="col-md-6 text-center">
                <h4 class="fw-bold mb-3">Lokasi Kami</h4>
                <p class="text-muted">Jl. Contoh No.123, Bogor - Indonesia</p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="https://wa.me/6283819937178" class="btn btn-dark"><i class="fab fa-whatsapp"></i></a>
                    <a href="https://instagram.com/diajenglarasati_272" class="btn btn-dark"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include 'layout/footer.php'; ?>