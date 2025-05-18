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

<!-- Section: Agenda --> 
<section class="page-section bg-light <?= isset($menu_status['agenda']) && !$menu_status['agenda'] ? 'd-none' : '' ?>" id="agenda">
    <div class="container">
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
    </div>
</section>


<!-- Section: Capaian -->
<section class="page-section <?= isset($menu_status['capaian']) && !$menu_status['capaian'] ? 'd-none' : '' ?>" id="capaian">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Capaian</h2>
        </div>
        <div class="row">
            <?php if (!empty($capaian)) : ?>
                <?php foreach ($capaian as $item): ?>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <h4><?= htmlspecialchars($item['nama']); ?></h4>
                    <p class="text-muted"><?= htmlspecialchars($item['capaian']); ?></p>
                </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="col-12 text-center py-5">
                    <i class="fas fa-book-open fa-3x text-muted mb-3"></i>
                    <p class="text-muted">Tidak ada capaian saat ini.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Section: Gallery -->
<section class="page-section bg-light <?= isset($menu_status['galery']) && !$menu_status['galery'] ? 'd-none' : '' ?>" id="galery">
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
</section>



<?php
include 'layout/footer.php';
?>