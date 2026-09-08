<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('../assets/img/kantor.png');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
            <h2>Info Pelanggan</h2>
            <ol>
                <li><a href="<?= base_url('publik') ?>">Beranda</a></li>
                <li><?= $title ?></li>
            </ol>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- ======= No Pengaduan UPK Section ======= -->
    <section id="noPengaduanUPK" class="noPengaduanUPK">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>No Pengaduan UPK</h2>
                <p>Hubungi Kepala UPK sesuai wilayah layanan melalui WhatsApp untuk pengaduan dan keluhan Anda</p>
            </div>

            <div class="row gy-4">
                <?php if (!empty($upk)) : ?>
                    <?php $no = 0; ?>
                    <?php foreach ($upk as $row) : ?>
                        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="<?= ($no * 100) ?>">
                            <?php $no++; ?>
                            <div class="card h-100 border-0 shadow-sm" style="border-radius: 12px; transition: transform 0.3s;">
                                <div class="card-body text-center p-4">
                                    <div class="mb-3" style="width: 60px; height: 60px; background: linear-gradient(135deg, #25d366, #128c7e); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                                        <i class="fab fa-whatsapp" style="font-size: 28px; color: #fff;"></i>
                                    </div>
                                    <h5 class="card-title fw-bold"><?= $row->nama_upk ?></h5>
                                    <p class="card-text text-muted mb-3">
                                        <i class="bi bi-person-fill"></i> <?= $row->nama_kepala ?>
                                    </p>
                                    <a href="https://wa.me/<?= $row->no_wa ?>" target="_blank" class="btn btn-success btn-sm px-4" style="border-radius: 20px;">
                                        <i class="fab fa-whatsapp"></i> Hubungi WA
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="col-12 text-center">
                        <div class="alert alert-warning">
                            <i class="bi bi-info-circle"></i> Data No Pengaduan UPK belum tersedia.
                        </div>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </section><!-- End No Pengaduan UPK Section -->

</main><!-- End #main -->